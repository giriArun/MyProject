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
    <link href="../asset/css/admin.css" rel="stylesheet">
    <!-- <link href="../asset/css/profile.css" rel="stylesheet"> -->


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

    <section class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row background-color-bone">
                <div class="col-1"></div>
                <div class="col-10 my-5">hello world</div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>

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

    <footer class="px-4 pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-0 col-sm-0 col-md-6 col-lg-6 mb-5 d-none d-lg-inline-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <i class="bi bi-c-square"></i>
                            2024 by Arun Giri
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 fw-bold">
                            <a href="#" class="text-decoration-none">
                                Download CV
                                <i class="bi bi-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 col-md-3 col-lg-4 mb-5">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 fw-bold">
                                    Call
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <a href="tel:+919547676205" class="text-decoration-none text-dark">954-767-6205</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-4 mb-5">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 fw-bold">
                                    Write
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <a href="mailto:giri.arun592@gmail.com"
                                        class="text-decoration-none text-dark">giri.arun592@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-4 mb-5">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 fw-bold">
                                    Follow
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <a href="#"><i class="bi bi-whatsapp mx-1 text-dark"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp mx-1 text-dark"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp mx-1 text-dark"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp mx-1 text-dark"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-4 mb-5 d-lg-none d-inline-block">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <i class="bi bi-c-square"></i>
                                    2024 by Arun Giri
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 fw-bold">
                                    <a href="#" class="text-decoration-none">
                                        Download CV
                                        <i class="bi bi-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>