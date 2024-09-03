<?php include '../include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_config[ "absolute_path_admin" ] . '/include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php 
        include $_config[ "absolute_path_admin" ] . '/include/header.php';

        $educationId = 0;
        $institutionName = "";
        $degreeName = "";
        $startDate = "";
        $endDate = "";
        $isContinue = 1;
        $institutionAddress = "";
        $degreeDetail = "";

        if( count( $educationData ) && $educationData[ "status" ] && is_array( $educationData[ "data" ] ) && count( $educationData[ "data" ] ) == 1 ){
            $data = $educationData[ "data" ][ 0 ];
            
            $educationId = $data[ "educationId" ];
            $institutionName = $data[ "institutionName" ];
            $degreeName = $data[ "degreeName" ];
            $startDate = $data[ "startDate" ];
            $endDate = $data[ "endDate" ];
            $isContinue = $data[ "isContinue" ];
            $institutionAddress = $data[ "institutionAddress" ];
            $degreeDetail = $data[ "degreeDetail" ];
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
                                    <input type="hidden" name="educationId" value="<?=$educationId;?>">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-8 validationInstitutionName">
                                        <label for="validationInstitutionName" class="form-label">Institution Name</label>
                                        <input type="text" class="form-control" id="validationInstitutionName" name="institutionName" maxlength="100" data-type="string" data-name="Institution Name" value="<?=$institutionName;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Institution Name.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationDegreeName">
                                        <label for="validationDegreeName" class="form-label">Degree Name</label>
                                        <input type="text" class="form-control" id="validationDegreeName" name="degreeName" maxlength="20" data-type="string" data-name="Degree Name" value="<?=$degreeName;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Degree Name.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationStartDate">
                                        <label for="validationStartDate" class="form-label">Degree Start Date</label>
                                        <input type="date" class="form-control" id="validationStartDate" name="startDate" data-type="date" data-name="Degree Start Date" value="<?=$startDate;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Degree Start Date.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationEndDate">
                                        <label for="validationEndDate" class="form-label">Degree End Date</label>
                                        <input type="date" class="form-control" id="validationEndDate" name="endDate" data-type="date" data-name="Degree End Date" value="<?=$isContinue == 1 ? "" : $endDate;?>" <?=$isContinue == 1 ? "disabled" : "";?> required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Degree End Date.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 continueDegree">
                                        <label class="form-label m-2 p-2 d-none d-xxl-inline-block"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="continueDegree" type="checkbox" value="1" id="continueDegree" <?=$isContinue == 1 ? "checked" : "";?>>
                                            <label class="form-check-label" for="continueDegree">
                                                The Degree is still ongoing.
                                            </label>
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 validationInstitutionAddress">
                                        <label for="validationInstitutionAddress" class="form-label">Institution Address</label>
                                        <input type="text" class="form-control" id="validationInstitutionAddress" name="institutionAddress" maxlength="250" data-type="address" data-name="Institution Address" value="<?=$institutionAddress;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Institution Address.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 validationDegreeDetail">
                                        <label for="validationDegreeDetail" class="form-label">Degree Detail</label>
                                        <textarea class="form-control" id="validationDegreeDetail" name="degreeDetail" maxlength="500" data-type="address" data-name="Degree Detail" required><?=$degreeDetail;?></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Degree Detail.</div>
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

    <?php include $_config[ "absolute_path_admin" ] . '/include/footer.php';?>

</body>

</html>
<?php include $_config[ "absolute_path_admin" ] . '/include/ajaxPopupModal.php';?>
<?php include $_config[ "absolute_path_admin" ] . '/include/foot.php';?>