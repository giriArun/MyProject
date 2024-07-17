//::::Global::::

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


//function
function hasWhiteSpace(s) {
    return s.indexOf(' ') >= 0;
}

function validateSingleName(name) {
    const pattern = new RegExp('^[A-Za-z]+$');
    name = name.trim();

    if (name.length > 0 && pattern.test(name) && !hasWhiteSpace(name)) {
        return true;
    } else {
        return false;
    }
}

function validateNumber(name) {
    const pattern = new RegExp('^[0-9]+$');
    name = name.trim();

    if (name.length > 0 && pattern.test(name) && !hasWhiteSpace(name)) {
        return true;
    } else {
        return false;
    }
}

function validatePassword(name) {
    const pattern = new RegExp('^[A-Za-z0-9!@#$&]+$');
    name = name.trim();

    if (name.length > 0 && pattern.test(name) && !hasWhiteSpace(name)) {
        return true;
    } else {
        return false;
    }
}

function validateStringLength(name, maxLength, minLength = 1) {
    name = name.trim();

    if (name.length > maxLength || name.length < minLength) {
        return false;
    } else {
        return true;
    }
}

function validateIisEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function validateAddress(name) {
    const pattern = new RegExp('^[0-9a-zA-Z ,.:_\-]+$');
    name = name.trim();

    if (name.length > 0 && pattern.test(name)) {
        return true;
    } else {
        return false;
    }
}

function validatePlace(name) {
    const pattern = new RegExp('^[0-9a-zA-Z ._\-]+$');
    name = name.trim();

    if (name.length > 0 && pattern.test(name)) {
        return true;
    } else {
        return false;
    }
}

function validateUrl(name) {
    const pattern = new RegExp('/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i');
    name = name.trim();

    if (name.length > 0 && pattern.test(name)) {
        return true;
    } else {
        return false;
    }
}

function validatedForm(
    data = "",
    dataType = "",
    dataName = "",
    minLength = 1,
    maxLength = 0
) {
    var returnMessage = "";

    if (dataType == 'singleName') {
        returnMessage = validateSingleName(data) ? "" : "Please enter a valid " + dataName + ".";
    } else if (dataType == 'email') {
        returnMessage = validateIisEmail(data) ? "" : "Please enter a valid " + dataName + ".";
    } else if (dataType == 'phone') {
        returnMessage = validateNumber(data) ? "" : "Please enter a valid " + dataName + ".";
    } else if (dataType == 'address') {
        returnMessage = validateAddress(data) ? "" : "Please enter a valid " + dataName + ".";
    } else if (dataType == 'place') {
        returnMessage = validatePlace(data) ? "" : "Please enter a valid " + dataName + ".";
    } else if (dataType == 'url') {
        //returnMessage = validateUrl(data) ? "" : "Please enter a valid " + dataName + ".";
    }

    if (returnMessage == "" && maxLength > 0) {
        var lengthMessage = "";
        if (maxLength == minLength) {
            lengthMessage = "Please enter a " + dataName + " with " + maxLength + " characters.";
        } else if (maxLength > minLength && minLength > 1) {
            lengthMessage = "Please enter a " + dataName + " between " + minLength + " and " + maxLength + " characters.";
        } else {
            lengthMessage = "Please enter a " + dataName + " within " + maxLength + " characters.";
        }
        returnMessage = validateStringLength(data, maxLength, minLength) ? "" : lengthMessage;
    }

    console.log(data, dataType, dataName, minLength, maxLength, returnMessage);
    return returnMessage;
}

//logout
function logout() {
    var formData = [{ name: 'actionType', value: 'logOutSubmit' }];

    ajaxCall(formData = formData, redirectUrl = "login.php");
}

//profile
function editProfile(isEdit) {
    var elem = document.getElementById('form_profileEdit').elements;

    $(elem).each(function (e) {
        if (isEdit) {
            $('.formLabel', '.' + this.id).addClass('d-none');
            $('.formField', '.' + this.id).removeClass('d-none');
        } else {
            $('.formLabel', '.' + this.id).removeClass('d-none');
            $('.formField', '.' + this.id).addClass('d-none');
        }
    });

    if (isEdit) {
        document.querySelector(".profileEditButton .editButton").classList.add("d-none");
        document.querySelector(".profileEditButton .viewButton").classList.remove("d-none");
    } else {
        document.querySelector(".profileEditButton .editButton").classList.remove("d-none");
        document.querySelector(".profileEditButton .viewButton").classList.add("d-none");
    }
}

//ajax call
function ajaxCall(formData, redirectUrl = '') {
    var returnData = [];

    $.ajax({
        type: "POST",
        async: false,
        url: "../model/ajaxService.php",
        data: formData,
        success: function (data) {
            data = JSON.parse(data);

            if ("status" in data) {
                var html = '';

                if (data.status) {
                    if ("message" in data) {
                        data.message.forEach((x, i) => html += '<div class="text-success">' + x + '</div>');
                    }

                    if ("newPassword" in data && data.newPassword) {
                        setTimeout(function () {
                            window.location.href = data.redirectUrl;
                        }, 1000);
                    } else if (redirectUrl != '') {
                        setTimeout(function () {
                            window.location.href = redirectUrl;
                        }, 1000);
                    }

                    if ("data" in data && data.data != '' && !$.isEmptyObject(data.data)) {
                        $.each(data.data, function (index, value) {
                            $('.' + index).val(value);
                        });

                    }
                } else {
                    if ("message" in data) {
                        data.message.forEach((x, i) => html += '<div class="text-danger">' + x + '</div>');
                    }
                }

                $('#ajaxPopupModal').modal('show').find('div.modal-body').html(html);
            }
        }
    });

    return returnData;
}

//::::Page specific::::
$(function () {
    if (document.body.classList.contains('signup')) {

        $("form[ name = 'form_signup' ]").submit(function (e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            formData.push({ name: 'actionType', value: 'signUpSubmit' });

            if (!validateSingleName(this.firstName.value)) {
                this.firstName.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.firstName.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.firstName.id).css('display', 'block').html('Please enter a valid name.');
            } else if (!validateStringLength(this.firstName.value, 20)) {
                this.firstName.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.firstName.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.firstName.id).css('display', 'block').html('Please enter a name within 20 characters.');
            } else if (!validateSingleName(this.lastName.value)) {
                this.lastName.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.lastName.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.lastName.id).css('display', 'block').html('Please enter a valid name.');
            } else if (!validateStringLength(this.lastName.value, 20)) {
                this.lastName.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.lastName.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.lastName.id).css('display', 'block').html('Please enter a name within 20 characters.');
            } else if (!validateIisEmail(this.email.value)) {
                this.email.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.email.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.email.id).css('display', 'block').html('Please enter a valid Email.');
            } else if (!validateStringLength(this.email.value, 50)) {
                this.email.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.email.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.email.id).css('display', 'block').html('Please enter a Email within 50 characters.');
            } else if (!validateNumber(this.phone.value)) {
                this.phone.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.phone.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.phone.id).css('display', 'block').html('Please enter a valid Phone number.');
            } else if (!validateStringLength(this.phone.value, 10, 10)) {
                this.phone.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.phone.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.phone.id).css('display', 'block').html('Please enter a Phone within 10 number.');
            } else if (!validatePassword(this.password.value)) {
                this.password.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.password.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.password.id).css('display', 'block').html('Please enter a valid Password(characters,Numbers,!,@,#,$,&).');
            } else if (!validateStringLength(this.password.value, 16, 8)) {
                this.password.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.password.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.password.id).css('display', 'block').html('Please enter a Password between 8 to 16 characters.');
            } else {
                ajaxCall(formData = formData, redirectUrl = "login.php");
            }
        });

        $('.signup .form-control').on("keyup", function (e) {
            if ($('div.valid-feedback, div.invalid-feedback', '.' + this.id).hasClass('d-none')) {
                $('div.valid-feedback, div.invalid-feedback', '.' + this.id).removeClass('d-none');
                $('div.invalid-js-message', '.' + this.id).css('display', 'none');
            }
        });

    } else if (document.body.classList.contains('login')) {

        $("form[ name = 'form_login' ]").submit(function (e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            formData.push({ name: 'actionType', value: 'logInSubmit' });

            if (!validateIisEmail(this.emailPhone.value) && !validateNumber(this.emailPhone.value)) {
                this.emailPhone.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.emailPhone.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.emailPhone.id).css('display', 'block').html('Please enter a valid Email or Phone number.');
            } else if (!validatePassword(this.password.value)) {
                this.password.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.password.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.password.id).css('display', 'block').html('Please enter a valid Password.');
            } else if (!validateStringLength(this.password.value, 16, 8)) {
                this.password.focus();
                $('div.valid-feedback, div.invalid-feedback', '.' + this.password.id).addClass('d-none');
                $('div.invalid-js-message', '.' + this.password.id).css('display', 'block').html('Please enter a Password between 8 to 16 characters.');
            } else {
                if (validateIisEmail(this.emailPhone.value) && !validateStringLength(this.emailPhone.value, 50)) {
                    this.emailPhone.focus();
                    $('div.valid-feedback, div.invalid-feedback', '.' + this.emailPhone.id).addClass('d-none');
                    $('div.invalid-js-message', '.' + this.emailPhone.id).css('display', 'block').html('Please enter a Email within 50 characters.');
                } else if (validateNumber(this.emailPhone.value) && !validateStringLength(this.emailPhone.value, 10, 10)) {
                    this.emailPhone.focus();
                    $('div.valid-feedback, div.invalid-feedback', '.' + this.emailPhone.id).addClass('d-none');
                    $('div.invalid-js-message', '.' + this.emailPhone.id).css('display', 'block').html('Please enter a Phone within 10 number.');
                } else {
                    ajaxCall(formData = formData, redirectUrl = "index.php");
                }
            }
        });

        $('.login .form-control').on("keyup", function (e) {
            if ($('div.valid-feedback, div.invalid-feedback', '.' + this.id).hasClass('d-none')) {
                $('div.valid-feedback, div.invalid-feedback', '.' + this.id).removeClass('d-none');
                $('div.invalid-js-message', '.' + this.id).css('display', 'none');
            }
        });

    } else if (document.body.classList.contains('profile')) {
        $(".profileEditButton .editButton").click(function () {
            editProfile(true);
        });

        $(".profileEditButton .viewButton").click(function () {
            editProfile(false);
        });


        $("form[ name = 'form_profileEdit' ]").submit(function (e) {
            e.preventDefault();
            var returnMessage = "";
            var isAjaxCall = true;

            $(this.elements).each(function (e) {
                var minLength = $(this).attr('minlength');
                var maxLength = $(this).attr('maxlength');
                var dataType = $(this).data('type');
                var dataName = $(this).data('name');
                var dataValue = $(this).val();

                if (typeof dataType != 'undefined' && ((dataValue).trim()).length > 0) {
                    returnMessage = validatedForm(
                        data = dataValue,
                        dataType = dataType,
                        dataName = dataName,
                        minLength = minLength,
                        maxLength = maxLength
                    );

                    if (returnMessage != "") {
                        isAjaxCall = false;
                        this.focus();
                        $('div.valid-feedback, div.invalid-feedback', '.' + this.id).addClass('d-none');
                        $('div.invalid-js-message', '.' + this.id).css('display', 'block').html(returnMessage);
                    }
                }


            });





            if (isAjaxCall) {
                var formData = $(this).serializeArray();
                formData.push({ name: 'actionType', value: 'profileSubmit' });

                ajaxCall(formData = formData, redirectUrl = "");
            }

        });

        $('.profile .form-control').on("keyup", function (e) {
            if ($('div.valid-feedback, div.invalid-feedback', '.' + this.id).hasClass('d-none')) {
                $('div.valid-feedback, div.invalid-feedback', '.' + this.id).removeClass('d-none');
                $('div.invalid-js-message', '.' + this.id).css('display', 'none');
            }
        });

        //validationProfileImage
        var _URL = window.URL || window.webkitURL;
        $("#validationProfileImage").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    alert(this.width + " " + this.height);
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        });
    }
});


