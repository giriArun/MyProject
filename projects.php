<?php include 'include/global.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body>

    <?php include 'include/header.php';?>
    
    <section class="projects">
        <div class="container-fluid">
            <div class="row parent-box py-5">
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
                <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-8">
                    <div class="row">
                        <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                            <div class="row my-5 pb-4 pt-0">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center fs-2 fw-bold">
                                    <i class="bi bi-square-fill text-primary fs-4"></i>
                                    Projects
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-0 col-sm-0 col-md-1 col-lg-1"></div>
                                <div class="col-12 col-sm-12 col-md-10 col-lg-10 text-start fs-6">
                                    I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click
                                    “Edit Text” or double click me to add your own content and make changes to the font.
                                    I’m a great place for you to tell a story and let your users know a little more
                                    about you.
                                </div>
                                <div class="col-0 col-sm-0 col-md-1 col-lg-1"></div>
                            </div>
                            <div class="row">
                                <?php
                                    if( $projectsData[ "status" ] ){
                                        foreach( $projectsData[ "data" ] as $projectData ){
                                            ?>
                                                <div class="col-12 bg-white mt-4 mb-5 shadow">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 py-5 px-5 position-relative">
                                                            <div class="bg-primary position-absolute top-0 start-0 my-5 py-5 px-2">
                                                            </div>
                                                            <div class="text-primary fw-bold fs-4">
                                                                <?=$projectData[ "projectName" ];?>
                                                                <?php
                                                                    if( strlen( trim( $projectData[ "projectSiteUrl" ] ) ) > 0 ){
                                                                        ?>
                                                                            <a href="<?=$projectData[ "projectSiteUrl" ];?>" target="_blank" title="Project Link"><i class="bi bi-link-45deg"></i></a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <div class="fs-5"><?=$projectData[ "projectRoleType" ];?></div>
                                                            <div class="lh-1 text-muted fw-light">
                                                                <?php
                                                                    $startDate = date_format( date_create( $projectData[ "startDate" ] ), "M Y" );
                                                                    $endDate = $projectData[ "isContinue" ] ? "Present" : date_format( date_create( $projectData[ "endDate" ] ), "M Y" );

                                                                    echo $startDate . " - " . $endDate;
                                                                ?>
                                                            </div>
                                                            <div class="p-2"></div>
                                                            <div class="fs-6 mt-2 fw-normal"><?=$projectData[ 'projectTechnologies' ];?></div>
                                                            <div class="fs-6 mt-2 fw-normal"><?=$projectData[ 'projectTools' ];?></div>
                                                            <div class="fs-6 mt-2 fw-normal"><?=htmlspecialchars_decode( $projectData[ 'projectDescription' ] );?></div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 px-0">
                                                            <img src="asset/images/uploadImages/<?=$projectData[ "projectImage" ];?>"
                                                                class="img-fluid height-webkit-fill-available"
                                                                alt="map image"
                                                                onerror="this.onerror=null; this.src='asset/images/icon/project.png'">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                    </div>
                </div>
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>

            </div>
        </div>
    </section>

    <?php include 'include/footer.php';?>
    
</body>

</html>