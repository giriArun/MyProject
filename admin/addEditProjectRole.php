<?php include 'include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php include 'include/header.php';?>


    <section class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row background-color-bone">
                <div class="col-1"></div>
                <div class="col-10 my-5">
                    <div class="fs-2 text-center mb-5 mt-3 text-primary">Project Role</div>
                    <div class="row">
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                            <div class="row">
                                <form class="row g-3 needs-validation" name="form_projectRoleType" id="form_projectRoleType" method="post" novalidate>
                                    <div class="col-12 validationRoleType">
                                        <label for="validationRoleType" class="form-label">Project Role Type</label>
                                        <input type="text" class="form-control" id="validationRoleType" name="roleType" maxlength="50" data-type="string" data-name="Project Role Type" value="<?=$projectRoleType;?>" required>
                                        <input type="hidden" name="projectRoleId" value="<?=$projectroleId;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project Role Type.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>

    <?php include 'include/footer.php';?>

</body>

</html>
<?php include 'include/ajaxPopupModal.php';?>
<?php include 'include/foot.php';?>