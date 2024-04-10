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

//ajax call
function ajaxCall(formData) {
    var returnData = [];

    $.ajax({
        type: "POST",
        async: false,
        url: "../model/ajaxService.php",
        data: formData,
        success: function (data) {
            returnData = JSON.parse(data);
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
                var data = ajaxCall(formData);

                if ("status" in data) {
                    var html = '';

                    if (data.status) {
                        if ("message" in data) {
                            data.message.forEach((x, i) => html += '<div class="text-success">' + x + '</div>');
                        }
                        setTimeout(function () {
                            window.location.href = "login.php";
                        }, 1000);
                    } else {
                        if ("message" in data) {
                            data.message.forEach((x, i) => html += '<div class="text-danger">' + x + '</div>');
                        }
                    }

                    $('#ajaxPopupModal').modal('show').find('div.modal-body').html(html);
                }
            }
        });

        $('.signup .form-control').on("keyup", function (e) {
            console.log('0');
            if ($('div.valid-feedback, div.invalid-feedback', '.' + this.id).hasClass('d-none')) {
                $('div.valid-feedback, div.invalid-feedback', '.' + this.id).removeClass('d-none');
                $('div.invalid-js-message', '.' + this.id).css('display', 'none');
            }
        });
    }
});


