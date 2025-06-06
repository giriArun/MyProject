<title><?=$pageTitle;?></title>
<link rel="icon" type="image/x-icon" href="<?=$_config[ "root_path" ];?>/asset/images/icon/favicon.ico">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<?php
    if( in_array( $action, array( "family" ) ) ){
        ?>
            <!-- dataTable -->
            <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css" />
        <?php
    }

    if( in_array( $action, array( "addeditfamily" ) ) ){
        ?>
            <!-- search dropdown -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
        <?php
    }
?>

<!-- Custom css -->
<link href="<?=$_config[ "root_path" ];?>/asset/css/admin.css" rel="stylesheet">
<!-- <link href="../asset/css/profile.css" rel="stylesheet"> -->


<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ysabeau+Office:ital,wght@0,1..1000;1,1..1000&display=swap"
    rel="stylesheet">

