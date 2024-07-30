<?php include 'include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php 
        include 'include/header.php';

        $projectId = 0;
        $projectName = "";
        $projectSiteUrl = "";
        $stratDate = "";
        $endDate = "";
        $isContinue = "";
        $projectTechnologies = "";
        $projectTools = "";
        $projectDescription = "";
        $projectImage = "";
        $projectRoleId = "";

        if( $projectsData[ "status" ] && is_array( $projectsData[ "data" ] ) && count( $projectsData[ "data" ] ) == 1 ){
            $projectData = $projectsData[ "data" ][ 0 ];
            
            $projectId = $projectData[ "projectId" ];
            $projectName = $projectData[ "projectName" ];
            $projectSiteUrl = $projectData[ "projectSiteUrl" ];
            $stratDate = $projectData[ "stratDate" ];
            $endDate = $projectData[ "endDate" ];
            $isContinue = $projectData[ "isContinue" ];
            $projectTechnologies = $projectData[ "projectTechnologies" ];
            $projectTools = $projectData[ "projectTools" ];
            $projectDescription = $projectData[ "projectDescription" ];
            $projectImage = $projectData[ "projectImage" ];
            $projectRoleId = $projectData[ "projectRoleId" ];
        }
    ?>


    <section class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row background-color-bone">
                <div class="col-1"></div>
                <div class="col-10 my-5">
                    <div class="fs-2 text-center mb-5 mt-3 text-primary">Projects</div>
                    <div class="row">
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                            <div class="row">
    <?php
        print_r($projectsData[ "data" ]);
    ?>
                                <form class="row g-3 needs-validation" name="form_projects" id="form_projects" method="post" novalidate>
                                    <input type="hidden" name="projectId" value="<?=$projectId;?>">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-8 validationProjectName">
                                        <label for="validationProjectName" class="form-label">Project Name</label>
                                        <input type="text" class="form-control" id="validationProjectName" name="projectName" maxlength="100" data-type="string" data-name="Project Name" value="<?=$projectName;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project Name.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationRoleType">
                                        <label for="validationRoleType" class="form-label">Project Role Type</label>
                                        <select class="form-select" id="validationRoleType" name="roleTypeId" data-type="string" data-name="Project Role Type" required aria-label="Default select example">
                                            <option value="0">Select Project Role Type</option>
                                            <?php
                                                if( $projectRoleData[ "status" ] ){
                                                    foreach ( $projectRoleData[ "data" ] as $roleData) {
                                                        ?>
                                                            <option <?=$projectRoleId == $roleData[ "projectroleId" ] ? "selected" : "";?> value="<?=$roleData[ "projectroleId" ];?>"><?=$roleData[ "projectRoleType" ];?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project Role Type.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationStartDate">
                                        <label for="validationStartDate" class="form-label">Project Start Date</label>
                                        <input type="date" class="form-control" id="validationStartDate" name="startDate" data-type="date" data-name="Project Start Date" value="<?=$stratDate;?>" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project Start Date.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationEndDate">
                                        <label for="validationEndDate" class="form-label">Project End Date</label>
                                        <input type="date" class="form-control" id="validationEndDate" name="endDate" data-type="date" data-name="Project End Date" value="<?=$isContinue == 1 ? "" : $endDate;?>" <?=$isContinue == 1 ? "disabled" : "";?> required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project End Date.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 continueProject">
                                        <label class="form-label m-2 p-2"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="continueProject" type="checkbox" value="1" id="continueProject" <?=$isContinue == 1 ? "checked" : "";?>>
                                            <label class="form-check-label" for="continueProject">
                                                The project is still ongoing.
                                            </label>
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6 validationTechnologies">
                                        <label for="validationTechnologies" class="form-label">Technologies</label>
                                        <input type="text" class="form-control" id="validationTechnologies" name="technologies" maxlength="250" data-type="string" data-name="Technologies" value="<?=$projectTechnologies;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Technologies.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6 validationTools">
                                        <label for="validationTools" class="form-label">Tools</label>
                                        <input type="text" class="form-control" id="validationTools" name="tools" maxlength="250" data-type="string" data-name="Tools" value="<?=$projectTools;?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Tools.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6 validationProjectUrl">
                                        <label for="validationProjectUrl" class="form-label">Project URL</label>
                                        <input type="text" class="form-control" id="validationProjectUrl" name="projectUrl" maxlength="250" data-type="string" data-name="Project URL" value="<?=$projectSiteUrl?>">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project URL.</div>
                                        <div class="invalid-js-message"></div>
                                    </div>
                                    <div class="col-12 validationRoleType">
                                        <label for="validationRoleType" class="form-label">Project Description</label>
                                        <?php 
                                            $myTinyMce = $projectDescription;
                                            include '../tinyMCE/index.php';
                                        ?>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please provide the Project Description.</div>
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


    <?php
        print_r( $_SESSION );
    ?>
    <!-- <section class="about-me">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 parent-box-left"></div>
                <div class="col-7 col-sm-7 col-md-7 col-lg-7 parent-box-right"></div>
                <div class="position-absolute top-0 start-0 col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row my-5">
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-8">
                            <div class="row">
                                <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                                    <div class="row my-5">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center child-box-left">
                                            <div class="mx-md-2 mx-sm-5 mx-lg-5 my-5">
                                                <div>
                                                    <img class="rounded-circle profile-image"
                                                        src="asset/images/images.jpeg" alt="">
                                                </div>
                                                <div class="text-capitalize fw-bolder fs-1 my-3 profile-name">
                                                    <div class="profile-f-name">Arun</div>
                                                    <div class="">Giri</div>
                                                </div>
                                                <div class="w-25 m-auto bg-primary rounded-pill profile-line"></div>
                                                <div class="my-4 text-uppercase">Software Developer</div>
                                            </div>
                                            <div class="row bg-white text-center py-3">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                                                    <div class="row">
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 bg-white">
                                            <div class="mx-md-2 mx-sm-5 mx-lg-5 my-5">
                                                <h2 class="fw-bolder profile-hello">Hello</h2>
                                                <p class="fw-bold fs-5">Here's who I am & what I do</p>
                                                <div class="text-uppercase profile-butons mb-3">
                                                    <a class="btn btn-outline-dark fw-bold rounded-pill my-1" href="#"
                                                        role="button">RESUME</a>
                                                    <a class="btn btn-outline-dark fw-bold rounded-pill my-1" href="#"
                                                        role="button">PROJECTS</a>
                                                </div>
                                                <p class="fs-6">I'm a paragraph. Click here to add your own
                                                    text and
                                                    edit me. It's
                                                    easy. Just click “Edit Text” or double click me to add your own
                                                    content and make changes to the font.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                            </div>
                        </div>
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <?php include 'include/footer.php';?>

</body>

</html>
<?php include 'include/ajaxPopupModal.php';?>
<?php include 'include/foot.php';?>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>