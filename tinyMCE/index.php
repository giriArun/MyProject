<!DOCTYPE html>

<script src="../tinyMCE/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#myTinyMce',
    license_key: 'gpl|k9rmqm75y1bwckpnylfzqi2ks417a965aswo9ck2skw7f6o2', //google TineMCE Key (ignitedyourpassion@gmail.com)
    height: 350,
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help'
  });
</script>

<textarea name="myTinyMce" id="myTinyMce" class="form-control"><?=isset($myTinyMce) ? $myTinyMce : "";?></textarea>