<section class="mt-5 pt-2">
    <div class="container-fluid">
        <div class="row background-color-bone">
            <div class="col-1"></div>
            <div class="col-10 my-5">
                <div class="fs-2 text-center mb-5 mt-3 text-primary"><?=$pageTitle;?></div>
                <div class="row">
                    <div class="col-12 messageBox">
                        <div class="row">
                            <div class="col-0 col-sm-1"></div>
                            <div class="col-12 col-sm-10">
                                <?php
                                    if( isset( $_SESSION[ 'successMessage' ] ) ){
                                        ?>
                                            <div class="alert alert-success" role="alert">
                                                <?=$_SESSION[ 'successMessage' ];?>
                                            </div>
                                        <?php
                                        unset( $_SESSION[ 'successMessage' ] );
                                    }
                                ?>
                            </div>
                            <div class="col-0 col-sm-1"></div>
                        </div>
                    </div>
                    <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Project List
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table cell-border hover order-column stripe w-100">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th>Project Name</th>
                                                            <th>Project Role</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th class="text-end">
                                                                <a href="<?=$_config[ "root_path_admin" ];?>/?action=addEditProject" class="btn btn-primary" title="Add">
                                                                    <i class="bi bi-plus-square"></i>
                                                                </a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if( $projectsData[ "status" ] ){
                                                                foreach ( $projectsData[ "data" ] as $projectData) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?=$projectData[ "projectName" ];?></td>
                                                                            <td><?=$projectData[ "projectRoleType" ];?></td>
                                                                            <td><?=$projectData[ "startDate" ];?></td>
                                                                            <td><?=$projectData[ "isContinue" ] == 1 ? "Continue" : $projectData[ "endDate" ];?></td>
                                                                            <td class="text-end">
                                                                                <a href="<?=$_config[ "root_path_admin" ];?>/?action=addEditProject&id=<?=$projectData[ "projectId" ];?>" class="btn btn-warning" title="Edit">
                                                                                    <i class="bi bi-pencil-square"></i>
                                                                                </a>
                                                                                <button type="button" 
                                                                                    class="btn btn-danger" 
                                                                                    title="Delete" 
                                                                                    data-bs-toggle="modal" 
                                                                                    data-bs-target="#deleteConfirmation" 
                                                                                    data-bs-id="<?=$projectData[ "projectId" ];?>" 
                                                                                    data-bs-name="<?=$projectData[ "projectName" ];?>" 
                                                                                    data-bs-type="projectDelete">
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
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Project Description
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Project Roles
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Project Role Type</th>
                                                            <th scope="col" class="text-end">
                                                                <a href="addEditProjectRole.php" class="btn btn-primary" title="Add">
                                                                    <i class="bi bi-plus-square"></i>
                                                                </a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if( $projectRoleData[ "status" ] ){
                                                                foreach ( $projectRoleData[ "data" ] as $roleData) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?=$roleData[ "projectRoleType" ];?></td>
                                                                            <td class="text-end">
                                                                                <a href="addEditProjectRole.php?id=<?=$roleData[ "projectroleId" ];?>" class="btn btn-warning" title="Edit">
                                                                                    <i class="bi bi-pencil-square"></i>
                                                                                </a>
                                                                                <button type="button" 
                                                                                    class="btn btn-danger" 
                                                                                    title="Delete" 
                                                                                    data-bs-toggle="modal" 
                                                                                    data-bs-target="#deleteConfirmation" 
                                                                                    data-bs-id="<?=$roleData[ "projectroleId" ];?>" 
                                                                                    data-bs-name="<?=$roleData[ "projectRoleType" ];?>" 
                                                                                    data-bs-type="projectRoleType">
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
                                </div>
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

<pre>
    TODO
    1. check all links
</pre>