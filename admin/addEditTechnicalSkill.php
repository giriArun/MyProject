<?php include 'include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php 
        include 'include/header.php';

        $skillId = 0;
        $skillName = "";
        $ratingScale = 50;

        if( isset( $technicalSkillData[ 'status' ] ) && $technicalSkillData[ 'status' ] && count( $technicalSkillData[ "data" ] ) ){
            $skillId = $technicalSkillData[ "data" ][ 0 ][ "technicalSkillId" ];
            $skillName = $technicalSkillData[ "data" ][ 0 ][ "skillName" ];
            $ratingScale = $technicalSkillData[ "data" ][ 0 ][ "ratingScale" ];
        }
    ?>

    <section class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row background-color-bone">
                <div class="col-1"></div>
                <div class="col-10 my-5">
                    <div class="fs-2 text-center mb-5 mt-3 text-primary">Technical Skill</div>
                    <div class="row">
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                            <div class="row">
                                <form class="row g-3 needs-validation" name="form_addEditTechnicalSkill" id="form_addEditTechnicalSkill" method="post" novalidate>
                                    <input type="hidden" name="skillId" value="<?=$skillId;?>">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4 validationSkillName">
                                        <label for="validationSkillName" class="form-label">Skill Name</label>
                                        <input type="text" class="form-control" id="validationSkillName" name="skillName" maxlength="50" data-type="string" data-name="Skill Name" value="<?=$skillName;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Skill Name.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xxl-8 validationRatingScale">
                                        <label for="validationRatingScale" class="form-label">Rating Scale 0-100</label>
                                        <input type="range" class="form-range" min="0" max="100" step="5" name="ratingScale" id="validationRatingScale" value="<?=$ratingScale;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Rating of Skill.</div>
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