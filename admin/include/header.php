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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php
                        if( $_SESSION[ "isAdmin" ] == 1 ){
                            $aboutMeActive = in_array( $parentClass, 
                                array( "projects", "addEditProjectRole", "addEditProject" ) 
                            ) ? 'active' : '';
                            $projectsActive = in_array( $parentClass, array( "projects", "addEditProjectRole", "addEditProject" ) ) ? 'active' : '';
                            ?>
                                <li class="nav-item dropdown text-uppercase">
                                    <a class="nav-link dropdown-toggle <?=$aboutMeActive;?>" href="#" id="aboutMeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        About Me
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="aboutMeDropdown">
                                        <li><a class="dropdown-item <?=$projectsActive;?>" href="projects.php">Projects</a></li>
                                        <li><a class="dropdown-item" href="#">Link 2</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Link 3</a></li>
                                    </ul>
                                </li>
                            <?php
                        }
                    ?>
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
                        <?php
                            $A_C_Active = in_array( 
                                strtolower( $pageTitle ), 
                                array( "profile", "ChangePassword", "Userlist", "Familylist") 
                            ) ? 'active' : '';
                        ?>
                        <a class="nav-link dropdown-toggle <?=$A_C_Active;?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item <?=( strtolower( $pageTitle ) == 'profile' ? 'active' : '' );?>" href="profile.php">
                                    Profile
                                </a>
                            </li>
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