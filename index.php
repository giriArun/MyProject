<?php include 'include/global.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body>

    <?php include 'include/header.php';?>

    <section class="about-me">
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
                                                        src="asset/images/uploadImages/<?=$headerFooterData[ "userPhoto" ];?>" 
                                                        alt="profile image"
                                                        onerror="this.onerror=null; this.src='asset/images/icon/profile_icon.png'">
                                                </div>
                                                <div class="text-capitalize fw-bolder fs-1 my-3 profile-name">
                                                    <div class="profile-f-name"><?=$headerFooterData[ "userFirstName" ];?></div>
                                                    <div class=""><?=$headerFooterData[ "userLastName" ];?></div>
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
    </section>

    <?php include 'include/footer.php';?>
    
</body>

</html>