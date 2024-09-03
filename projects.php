<?php include 'include/global.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">



    <!-- Custom css -->
    <link href="asset/css/profile.css" rel="stylesheet">


    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ysabeau+Office:ital,wght@0,1..1000;1,1..1000&display=swap"
        rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
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