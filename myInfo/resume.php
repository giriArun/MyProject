<section class="resume">
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
                                Resume
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-start fs-3 fw-bold">
                                Experience
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-end fs-3 text-uppercase">
                                <a href="" class="btn btn-primary rounded-pill fw-bold">
                                    <span class="d-none d-sm-inline-block">Download</span>
                                    CV
                                    <span class="d-sm-none d-inline-block"><i class="bi bi-download"></i></span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 bg-white my-3 py-5 px-5 shadow">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                        <div class="text-primary fw-bold fs-4">2022 - Present</div>
                                        <div class="fs-5 text-uppercase">JOB POSITION</div>
                                        <div class="fs-5">Company Name</div>
                                        <div class="fs-6 mt-2">Company Location</div>
                                    </div>
                                    <div class="col-0 col-sm-0 col-md-1 col-lg-1"></div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-4">
                                        <div class="my-1"><i class="bi bi-square-fill text-primary me-1"></i>
                                            <span class="fs-6">hello world</span>
                                        </div>
                                        <div class="my-1"><i class="bi bi-square-fill text-primary me-1"></i>
                                            <span class="fs-6">hello world</span>
                                        </div>
                                        <div class="my-1"><i class="bi bi-square-fill text-primary me-1"></i>
                                            <span class="fs-6">hello world</span>
                                        </div>
                                        <div class="my-1"><i class="bi bi-square-fill text-primary me-1"></i>
                                            <span class="fs-6">hello world</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-5">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-start fs-3 fw-bold">
                                Education
                            </div>
                        </div>
                        <div class="row">
                            
                            <?php
                                if( $educationsData[ "status" ] ){
                                    foreach( $educationsData[ "data" ] as $education ){
                                        ?>

                                            <div class="col-12 bg-white my-3 py-5 px-5 shadow">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                                        
                                                        <?php
                                                            $startDate = date_format( date_create( $education[ "startDate" ] ), "M Y" );
                                                            $endDate = $education[ "isContinue" ] ? "Present" : date_format( date_create( $education[ "endDate" ] ), "M Y" );
                                                        ?>

                                                        <div class="text-primary fw-bold fs-4"><?=$startDate;?> - <?=$endDate;?></div>
                                                        <div class="fs-5 text-uppercase"><?=$education[ "institutionName" ];?></div>
                                                        <div class="fs-5 fw-normal"><?=$education[ "degreeName" ];?></div>
                                                        <div class="mt-2 lh-1 text-muted fw-light"><?=$education[ "institutionAddress" ];?></div>
                                                    </div>
                                                    <div class="col-0 col-sm-0 col-md-1 col-lg-1"></div>
                                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-4">
                                                        <i class="bi bi-square-fill text-primary me-1"></i>
                                                        <span class="fs-6"><?=$education[ "degreeDetail" ];?></span>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                    }
                                }
                            ?>

                        </div>
                        <div class="row mb-3 mt-5">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-start fs-3 fw-bold">
                                Skills
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 bg-white my-3 py-5 px-5 shadow">
                                <div class="fw-bold fs-4 text-capitalize">Technical skills</div>
                                <div class="row mt-2">

                                    <?php
                                        if( $technicalSkillsData[ "status" ] ){
                                            foreach( $technicalSkillsData[ "data" ] as $technicalSkillData ){
                                                ?>

                                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
                                                        <div class="text-capitalize fs-6 fw-bold"><?=$technicalSkillData[ "skillName" ];?></div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="<?=$technicalSkillData[ "ratingScale" ];?>" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: <?=$technicalSkillData[ "ratingScale" ];?>%"><?=$technicalSkillData[ "ratingScale" ];?>%</div>
                                                        </div>
                                                    </div>

                                                <?php
                                            }
                                        }
                                    ?>

                                </div>
                                <div class="fw-bold fs-4 text-capitalize mt-5">Awards/Certifications</div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                        <i class="bi bi-square-fill text-primary"></i>
                                        <span class="fs-6">I attended an Android Application Development competition
                                            conducted by Entrench Electronics in associated with Exodia’16 at IIT,
                                            Mandi.</span>
                                    </div>
                                </div>
                                <div class="fw-bold fs-4 text-capitalize mt-5">Languages</div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
                                        <div class=""><i class="bi bi-square-fill text-primary"></i>
                                            <span class="fs-6">English (native)</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
                                        <div class=""><i class="bi bi-square-fill text-primary"></i>
                                            <span class="fs-6">English (native)</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
                                        <div class=""><i class="bi bi-square-fill text-primary"></i>
                                            <span class="fs-6">English (native)</span>
                                        </div>
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