<?php 
    $projectId = 0;
    $projectName = "";
    $projectSiteUrl = "";
    $startDate = "";
    $endDate = "";
    $isContinue = 1;
    $projectTechnologies = "";
    $projectTools = "";
    $projectDescription = "";
    $projectImage = "";
    $projectRoleId = "";

    if( count( $projectsData ) && $projectsData[ "status" ] && is_array( $projectsData[ "data" ] ) && count( $projectsData[ "data" ] ) == 1 ){
        $projectData = $projectsData[ "data" ][ 0 ];
        
        $projectId = $projectData[ "projectId" ];
        $projectName = $projectData[ "projectName" ];
        $projectSiteUrl = $projectData[ "projectSiteUrl" ];
        $startDate = $projectData[ "startDate" ];
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
                <div class="fs-2 text-center mb-5 mt-3 text-primary"><?=$pageTitle;?></div>
                <div class="row">
                    <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                        <div class="row">
                            <form class="row g-3 needs-validation" name="form_<?=$action;?>" id="form_<?=$action;?>" method="post" novalidate>
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
                                    <input type="date" class="form-control" id="validationStartDate" name="startDate" data-type="date" data-name="Project Start Date" value="<?=$startDate;?>" required>
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
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 validationProjectUrl">
                                    <label for="validationProjectUrl" class="form-label">Project URL</label>
                                    <input type="text" class="form-control" id="validationProjectUrl" name="projectUrl" maxlength="250" data-type="url" data-name="Project URL" value="<?=$projectSiteUrl?>">
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
                                <?php
                                    if( $projectId > 0 ){
                                        ?>
                                            <div class="col-12"><hr></div>

                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationMapImage">
                                                <label for="validationMapImage" class="form-label">Project Image</label>
                                                <div class="image_area">
                                                    <?php
                                                        $imageCount = 1;
                                                        $imageName = "project";
                                                        $imageId = $projectId;
                                                    ?>
                                                    <label for="uploadImage<?=$imageCount?>">
                                                        <img src="../asset/images/uploadImages/<?=$projectImage;?>" 
                                                            id="uploadedImage<?=$imageCount?>" 
                                                            class="img-responsive img-circle" 
                                                            onerror="this.onerror=null; this.src='../asset/images/icon/project.png'"/>
                                                        <div class="overlay">
                                                            <div class="text">Click to Change Project Image</div>
                                                        </div>
                                                        <input type="file" 
                                                            name="file_<?=$imageName?>" 
                                                            class="image" 
                                                            id="uploadImage<?=$imageCount?>" 
                                                            data-image-count = <?=$imageCount?>
                                                            data-image-name = <?=$imageName?>
                                                            data-image-id = <?=$imageId?>
                                                            style="display:none" />
                                                    </label>
                                                </div>
                                                <div class="valid-feedback" id="uploadedImageText<?=$imageCount?>">Looks good!</div>
                                            </div>
                                        
                                            <div class="col-12"><hr></div>
                                        <?php
                                    }
                                ?>
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

<?php ?>

