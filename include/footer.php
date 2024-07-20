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
                                <?php
                                    $footerPhone = $headerFooterData[ "userPhone" ];
                                    $footerPhoneFormat = substr( $footerPhone, 0, 3 ) . "-" .substr( $footerPhone, 3, 3 ) . "-" . substr( $footerPhone, 6, 4 );
                                ?>
                                <a href="tel:<?=$footerPhone;?>" class="text-decoration-none text-dark"><?=$footerPhoneFormat;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-4 mb-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 fw-bold">
                                Write
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <a href="mailto:<?=$headerFooterData[ "userEmail" ];?>"
                                    class="text-decoration-none text-dark"><?=$headerFooterData[ "userEmail" ];?></a>
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
                                2024 by <?=$headerFooterData[ "userFirstName" ];?> <?=$headerFooterData[ "userLastName" ];?>
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