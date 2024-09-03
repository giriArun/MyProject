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
                    <div class="fs-2 text-center mb-5 mt-3 text-primary">Skills</div>
                    <div class="row">
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Technical skills
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Skill Name</th>
                                                                <th scope="col">Rating Scale</th>
                                                                <th scope="col" class="text-end">
                                                                    <a href="addEditTechnicalSkill.php" class="btn btn-primary" title="Add">
                                                                        <i class="bi bi-plus-square"></i>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                if( $technicalSkillsData[ "status" ] ){
                                                                    foreach ( $technicalSkillsData[ "data" ] as $skillData) {
                                                                        ?>
                                                                            <tr>
                                                                                <td><?=$skillData[ "skillName" ];?></td>
                                                                                <td><?=$skillData[ "ratingScale" ];?></td>
                                                                                <td class="text-end">
                                                                                    <a href="addEditTechnicalSkill.php?id=<?=$skillData[ "technicalSkillId" ];?>" class="btn btn-warning" title="Edit">
                                                                                        <i class="bi bi-pencil-square"></i>
                                                                                    </a>
                                                                                    <button type="button" 
                                                                                        class="btn btn-danger" 
                                                                                        title="Delete" 
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#deleteConfirmation" 
                                                                                        data-bs-id="<?=$skillData[ "technicalSkillId" ];?>" 
                                                                                        data-bs-name="<?=$skillData[ "skillName" ];?>" 
                                                                                        data-bs-type="technicalSkillsType">
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
                                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Awards/Certifications
                                            </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
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
        :::Note:::
        =====Technical skills=====
        1. move to skill folder
        2. create a table
        3. create DB
        4. create add function
        5. show listing
        6. create update function
        7. delete function
        8. admin only check
        9. font end display
        =====Awards=====
        1. move to skill folder
        2. create a table
        3. create DB
        4. create add function
        5. show listing
        6. create update function
        7. delete function
        8. admin only check
        9. font end display
        =====Languages=====
        1. move to skill folder
        2. create a table
        3. create DB
        4. create add function
        5. show listing
        6. create update function
        7. delete function
        8. admin only check
        9. font end display
    </pre>

    <?php
        print_r( $_SESSION );
    ?>
    
    <?php include 'include/footer.php';?>

</body>

</html>

<?php include 'include/foot.php';?>

<?php include 'include/deletePopupModal.php';?>

<script>
  $(document).ready( function () {
    $('#projectsTable').DataTable(
        {
            columnDefs: [ { orderable: false, targets: -1 } ],
            scrollX: true
        }
    );
} );
</script>