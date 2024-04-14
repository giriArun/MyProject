<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="#">
                <i class="bi bi-square-fill text-primary fs-4"></i>
                <span class="fw-bold"><?=ucwords( $_SESSION[ 'userFirstName' ] . ' ' . $_SESSION[ 'userLastName' ] );?></span>
                <span class="d-none d-sm-inline-block"></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 text-start">
                    <li class="nav-item text-uppercase">
                        <a class="nav-link" aria-current="page" href="../admin/signup.php">Sign up</a>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a class="nav-link" aria-current="page" href="#">Login</a>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown text-uppercase">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Task
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Link 1</a></li>
                            <li><a class="dropdown-item" href="#">Link 2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Link 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown text-uppercase">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">User list</a></li>
                            <li><a class="dropdown-item" href="#">Family list</a></li>
                        </ul>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a class="nav-link" href="javascript:logout()">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>