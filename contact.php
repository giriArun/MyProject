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

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand fs-3" href="#">
                    <i class="bi bi-square-fill text-primary fs-4"></i>
                    <span class="fw-bold">Arun Giri</span>
                    <span class="d-none d-sm-inline-block"> / Software Developer</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 text-start">
                        <li class="nav-item">
                            <a class="nav-link active text-primary" aria-current="page" href="#">ABOUT ME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">RESUME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PROJECTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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
                                    Let's talk
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 bg-white mt-4 mb-5 shadow">
                                    <div class="row px-5 py-3">
                                        <form class="row g-3 needs-validation" novalidate action="" method="post">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 py-2 px-4">
                                                <label for="validationFirstName" class="form-label fw-bold">First
                                                    name</label>
                                                <input type="text" class="form-control" name="firstName"
                                                    id="validationFirstName" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the First name.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 py-2 px-4">
                                                <label for="validationLastName" class="form-label fw-bold">Last
                                                    name</label>
                                                <input type="text" class="form-control" name="lastName"
                                                    id="validationLastName" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Last name.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2 px-4">
                                                <label for="validationEmail" class="form-label fw-bold">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    id="validationEmail" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Email.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2 px-4">
                                                <label for="validationSubject"
                                                    class="form-label fw-bold">Subject</label>
                                                <input type="text" class="form-control" name="subject"
                                                    id="validationSubject" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Subject.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2 px-4">
                                                <label for="validationMessage"
                                                    class="form-label fw-bold">Message</label>
                                                <textarea class="form-control" name="message" id="validationMessage"
                                                    rows="3" required></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Message.
                                                </div>
                                            </div>
                                            <div class="col-12 py-2 px-4 mb-4">
                                                <button class="btn btn-primary fw-bold rounded-pill px-5"
                                                    type="submit">SEND</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-12 bg-white mt-4 mb-5 shadow">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 py-5 px-5">
                                            <div class="row">
                                                <div
                                                    class="col-6 col-sm-5 col-md-4 col-lg-3 text-primary fw-bold fs-4 text-end">
                                                    Arun
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 text-primary fw-bold fs-4">
                                                    Giri <a href="#"> <i class="bi bi-geo-fill"></i></i> </a>
                                                </div>
                                                <div class="col-12 py-3"></div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    Address:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    P.S:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    City/Town:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    Dist:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    PIN:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    State:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                    Country:
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                    Fatepur, Damodarpur
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 px-0">
                                            <img src="asset/images/testImage.jpg"
                                                class="img-fluid height-webkit-fill-available">
                                        </div>
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
    </section>

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


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>