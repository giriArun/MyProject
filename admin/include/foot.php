
<script>
    var rootPath = "<?=$_config[ "root_path" ];?>";
    var rootPathAdmin = "<?=$_config[ "root_path_admin" ];?>";
    var isDataTable = 0;
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-4.0.0-beta.js"></script>

<?php
    if( in_array( $action, array( "family" ) ) ){
        ?>
            <!-- data table -->
            <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
            <script>isDataTable = 1;</script>
        <?php
    }

    if( in_array( $action, array( "addeditfamily" ) ) ){
        ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
        <?php
    }
?>
    
<script src="<?=$_config[ "root_path" ];?>/asset/js/admin.js"></script>