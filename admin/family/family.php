<?php include '../include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_config[ "absolute_path_admin" ] . '/include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php include $_config[ "absolute_path_admin" ] . '/include/header.php';?>
    
    <section class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row background-color-bone">
                <div class="col-1"></div>
                <div class="col-10 my-5">
                    <div class="fs-2 text-center mb-5 mt-3 text-primary"><?=$pageTitle;?></div>
                    <div class="row">
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                            <div class="row">
                                <div class="col-12">
                                    <?php print_r($familyData["data"][1]);?>
                                    <table class="table" id="data_table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col" class="text-end">
                                                    <a href="<?=$_config[ "root_path_admin" ];?>/family/addEditFamily.php" class="btn btn-primary" title="Add">
                                                        <i class="bi bi-plus-square"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if( $familyData[ "status" ] ){
                                                    foreach ( $familyData[ "data" ] as $family ){
                                                        ?>
                                                            <tr>
                                                                <td><?=$family[ "name" ];?></td>
                                                                <td><?=$family[ "gender" ];?></td>
                                                                <td class="text-end">
                                                                    <a href="<?=$_config[ "root_path_admin" ];?>/family/addEditFamily.php?id=<?=$family[ "familyId" ];?>" class="btn btn-warning" title="Edit">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </a>
                                                                    <button type="button" 
                                                                        class="btn btn-danger" 
                                                                        title="Delete" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#deleteConfirmation" 
                                                                        data-bs-id="<?=$family[ "familyId" ];?>" 
                                                                        data-bs-name="<?=$family[ "name" ];?>" 
                                                                        data-bs-type="family">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>

    <?php include $_config[ "absolute_path_admin" ] . '/include/footer.php';?>

</body>

</html>

<?php include $_config[ "absolute_path_admin" ] . '/include/foot.php';?>

<?php include $_config[ "absolute_path_admin" ] . '/include/deletePopupModal.php';?>
