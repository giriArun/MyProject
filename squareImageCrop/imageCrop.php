

<link href="../asset/css/dropzoneV6.css" rel="stylesheet">
<link href="../asset/css/cropperV1.css" rel="stylesheet">

<script src="../asset/js/dropzoneV6.js"></script>
<script src="../asset/js/cropperV1.js"></script>
	
<style>
	.image_area {
		position: relative;
	}
	.image_area img, #squareImageCrop img {
		display: block;
		max-width: 100%;
	}
	#squareImageCrop .preview {
		overflow: hidden;
		width: 160px; 
		height: 160px;
		margin: 10px;
		border: 1px solid red;
	}
	#squareImageCrop .modal-lg{
		max-width: 1000px !important;
	}
	.image_area .overlay {
		position: absolute;
		bottom: 10px;
		left: 0;
		right: 0;
		background-color: rgba(255, 255, 255, 0.5);
		overflow: hidden;
		height: 0;
		transition: .5s ease;
		width: 100%;
	}
	.image_area:hover .overlay {
		height: 50%;
		cursor: pointer;
	}
	.image_area .text {
		color: #333;
		font-size: 20px;
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		text-align: center;
	}
</style>

<div class="modal fade" id="squareImageCrop" tabindex="-1" aria-labelledby="squareImageCropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="squareImageCropLabel">Image Crop</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-md-8">
							<img src="" id="sample_image" />
						</div>
						<div class="col-md-4">
							<div class="preview"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="crop">Crop</button>
			</div>
		</div>
	</div>
</div>	

<script>
	$(function () {
		var $modal = $('#squareImageCrop');
		var image = document.getElementById('sample_image');
		var cropper;
		var imageCount = 0;
		var imageName = "";
		var imageId = 0;

		$('#uploadImage1, #uploadImage2, #uploadImage3, #uploadImage4, #uploadImage5').change(function(event){
			imageCount = $( this ).data('image-count');
			imageName = $( this ).data('image-name');
			imageId = $( this ).data('image-id');
			
			var files = event.target.files;

			var done = function(url){
				image.src = url;
				$modal.modal('show');
			};

			if(files && files.length > 0){
				reader = new FileReader();
				reader.onload = function(event)
				{
					done(reader.result);
				};
				reader.readAsDataURL(files[0]);
			}
		});

		$modal.on('shown.bs.modal', function() {
			cropper = new Cropper(image, {
				aspectRatio: 1,
				viewMode: 3,
				preview:'.preview'
			});
		}).on('hidden.bs.modal', function(){
			cropper.destroy();
			cropper = null;
		});

		$('#crop').click(function(){
			canvas = cropper.getCroppedCanvas({
				width:400,
				height:400
			});

			canvas.toBlob(function(blob){
				url = URL.createObjectURL(blob);
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function(){
					var base64data = reader.result;
					$.ajax({
						url:'../squareImageCrop/upload.php',
						method:'POST',
						data:{image:base64data,imageName:imageName,imageId:imageId},
						success:function(data)
						{
							$modal.modal('hide');
							$('#uploadedImage' + imageCount ).attr('src', data);
							$('#uploadedImageText' + imageCount ).show( 1 );
						}
					});
				};
			});
		});
		
	});
</script>


