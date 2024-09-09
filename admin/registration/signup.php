<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 my-5 py-5">
                <div class="row">
                    <div class="col-1 col-sm-2 col-md-3 col-lg-3"></div>
                    <div class="col-10 col-sm-8 col-md-6 col-lg-6 bg-white shadow py-5 px-5">
                        <h1 class="text-primary text-center">SignUp</h1>
                        <form class="row g-3 needs-validation" novalidate action="" method="post" name="form_signup">
                            <div class="col-md-12 validationFirstName">
                                <label for="validationFirstName" class="form-label fw-bold">First name</label>
                                <input type="text" name="firstName" class="form-control" id="validationFirstName" value="" maxlength="20" autocomplete="off" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the First name.</div>
                                <div class="invalid-js-message">Please enter a valid name.</div>
                            </div>
                            <div class="col-md-12 validationLastName">
                                <label for="validationLastName" class="form-label fw-bold">Last name</label>
                                <input type="text" name="lastName" class="form-control" id="validationLastName" value="" maxlength="20" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the Last name.</div>
                                <div class="invalid-js-message">Please enter a valid name.</div>
                            </div>
                            <div class="col-md-12 validationEmail">
                                <label for="validationEmail" class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" name="email" id="validationEmail" value="" maxlength="50" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the Email.</div>
                                <div class="invalid-js-message">Please enter a valid Email.</div>
                            </div>
                            <div class="col-md-12 validationPhone">
                                <label for="validationPhone" class="form-label fw-bold">Phone</label>
                                <input type="number" name="phone" class="form-control" name="phone" id="validationPhone" value="" maxlength="10" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the Phone number.</div>
                                <div class="invalid-js-message">Please enter a valid Phone.</div>
                            </div>
                            <div class="col-md-12 validationPassword">
                                <label for="validationPassword" class="form-label fw-bold">Password</label>
                                <input type="password" name="password" class="form-control" name="password" id="validationPassword" value="" minlength="8" maxlength="16" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the Password.</div>
                                <div class="invalid-js-message">Please enter a valid Password.</div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="termAndCondition value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit">SignUp</button>
                            </div>
                            <div class="col-12 text-center">
                                <p>If you have already signed up, please click on the <a href="<?=$_config[ "root_path_admin" ];?>/?action=login" class="text-decoration-none">'Login'</a> button.</p>
                            </div>
                        </form>
                    </div>
                    <div class="col-1 col-sm-2 col-md-3 col-lg-3"></div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</section>