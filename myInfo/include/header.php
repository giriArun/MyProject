
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="<?=$_config[ "root_path" ];?>/">
                <i class="bi bi-square-fill text-primary fs-4"></i>
                <span class="fw-bold"><?=$headerFooterData[ "userFirstName" ];?> <?=$headerFooterData[ "userLastName" ];?></span>
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
                        <a class="nav-link <?=$action == "" ? "active text-primary" : "";?>" aria-current="page" href="<?=$_config[ "root_path" ];?>/">ABOUT ME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$action == "resume" ? "active text-primary" : "";?>" href="<?=$_config[ "root_path" ];?>/?action=resume">RESUME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$action == "projects" ? "active text-primary" : "";?>" href="<?=$_config[ "root_path" ];?>/?action=projects">PROJECTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$action == "contact" ? "active text-primary" : "";?>" href="<?=$_config[ "root_path" ];?>/?action=contact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
