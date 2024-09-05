<?php include '../include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_config[ "absolute_path_admin" ] . '/include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php 
        include $_config[ "absolute_path_admin" ] . '/include/header.php';

        $familyId = 0;
        $name = "";
        $gender = "";
        $sequence = 1;
        $nickName = "";
        $dob = "";
        $dod = "";
        $isRoot = "";

        if( count( $familyData ) && $familyData[ "status" ] && is_array( $familyData[ "data" ] ) && count( $familyData[ "data" ] ) == 1 ){
            $data = $familyData[ "data" ][ 0 ];
            
            $familyId = $data[ "familyId" ];
            $name = $data[ "name" ];
            $gender = $data[ "gender" ];
            $sequence = $data[ "sequence" ];
            $nickName = $data[ "nickName" ];
            $dob = $data[ "dob" ];
            $dod = $data[ "dod" ];
            $isRoot = $data[ "isRoot" ];
        }
    ?>


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
                                <form class="row g-3 needs-validation" name="form_<?=$parentClass;?>" id="form_<?=$parentClass;?>" method="post" novalidate>
                                    <input type="hidden" name="familyId" value="<?=$familyId;?>">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xxl-7 validationName">
                                        <label for="validationName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="validationName" name="name" maxlength="100" data-type="string" data-name="Name" value="<?=$name;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Name.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xxl-3 validationGender">
                                        <label for="validationGender" class="form-label">Gender</label>
                                        <select class="form-select" aria-label="Default select example" id="validationGender" name="gender" maxlength="20" data-type="string" data-name="Gender" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="F" <?=$gender == 'F'?'selected':''?>>Female</option>
                                            <option value="M" <?=$gender == 'M'?'selected':''?>>Male</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Gender.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3 col-lg-2 col-xxl-2 validationSequence">
                                        <label for="validationSequence" class="form-label">Sequence</label>
                                        <select class="form-control selectpicker" aria-label="Default select example" data-live-search="true" id="validationSequence" name="sequence" data-type="date" data-name="Sequence" required>
                                            <?php
                                                for ($x = 1; $x <= 15; $x++) {
                                                    ?>
                                                    <option value="<?=$x;?>" <?=$sequence == $x?'selected':''?>>
                                                        <?=$x;?>
                                                    </option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Sequence.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 validationNickName">
                                        <label for="validationNickName" class="form-label">NickName</label>
                                        <input type="text" class="form-control" id="validationNickName" name="nickName" data-type="string" data-name="NickName" value="<?=$nickName;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the NickName.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 validationDateOfBirth">
                                        <label for="validationDateOfBirth" class="form-label">Date Of Birth</label>
                                        <input type="date" class="form-control" id="validationDateOfBirth" name="dob" data-type="string" data-name="Date Of Birth" value="<?=$dob;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Date Of Birth.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 validationDateOfDeath">
                                        <label for="validationDateOfDeath" class="form-label">Date Of Death</label>
                                        <input type="date" class="form-control" id="validationDateOfDeath" name="dod" data-type="string" data-name="Date Of Death" value="<?=$dod;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Date Of Death.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6 validationInstitutionAddress">
                                        <label for="validationInstitutionAddress" class="form-label">Parent</label>
                                        <input type="text" class="form-control" id="validationInstitutionAddress" name="parent" maxlength="250" data-type="address" data-name="Institution Address" value="<?="";?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Institution Address.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6 validationDegreeDetail">
                                        <label for="validationDegreeDetail" class="form-label">Spouse</label>
                                        <input type="text" class="form-control" id="validationInstitutionAddress" name="spouse" maxlength="250" data-type="address" data-name="Institution Address" value="<?="";?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Degree Detail.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 validationInstitutionAddress">
                                        <input class="form-check-input" type="checkbox" id="validationCustom09" name="isRoot" <?=$isRoot == 1?'checked':''?>>
                                        <label class="form-check-label" for="validationCustom09">Is Root Person</label>
                                        <!-- <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Institution Address.</div>
                                        <div class="invalid-js-message"></div> -->
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
    <pre>
        :::Note:::
        check JS validation. maybe has issue
    </pre>
    <?php include $_config[ "absolute_path_admin" ] . '/include/footer.php';?>

</body>

</html>
<?php include $_config[ "absolute_path_admin" ] . '/include/ajaxPopupModal.php';?>
<?php include $_config[ "absolute_path_admin" ] . '/include/foot.php';?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    //$('.select2').select2();
</script> -->

https://codepen.io/mohan-aiyer/pen/gOWveJE