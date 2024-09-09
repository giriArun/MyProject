<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 my-5 py-5">
                <div class="row">
                    <div class="col-1 col-sm-2 col-md-3 col-lg-3"></div>
                    <div class="col-10 col-sm-8 col-md-6 col-lg-6 bg-white shadow py-5 px-5">
                        <h1 class="text-primary text-center">LogIn</h1>
                        <form class="row g-3 needs-validation" novalidate action="" method="post" name="form_login">
                            <div class="col-md-12 validationEmailPhone">
                                <label for="validationEmailPhone" class="form-label fw-bold">Email / Phone</label>
                                <input type="text" name="emailPhone" class="form-control" id="validationEmailPhone" value="" maxlength="50" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the Email or Phone number.</div>
                                <div class="invalid-js-message">Please enter a valid Email or Phone number.</div>
                            </div>
                            <div class="col-md-12 validationPassword">
                                <label for="validationPassword" class="form-label fw-bold">Password</label>
                                <input type="password" name="password" class="form-control" name="password" id="validationPassword" value="" minlength="8" maxlength="16" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please provide the Password.</div>
                                <div class="invalid-js-message">Please enter a valid Password.</div>
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <label class="" for="">
                                        forgot password
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit">LogIn</button>
                            </div>
                            <div class="col-12 text-center">
                                <p>If you are a new user, please click on the <a href="<?=$_config[ "root_path_admin" ];?>/?action=signup" class="text-decoration-none">'sign up'</a> button.</p>
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