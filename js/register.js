// login and register modal
$(document).ready(function () {
    $(".item#register").click(function () {
        $("#register-modal").modal({
            closable: false,
            onApprove: function () {
                var username = $("#username").val();
                var password = $("#password").val();
                var con_password = $("#con_password").val();
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var gender = $("#gender").val();
                var dob_day = $("#dob-day").val();
                var dob_month = $("#dob-month").val();
                var dob_year = $("#dob-year").val();
                var street = $("#street").val();
                var city = $("#city").val();
                var state = $("#state").val();
                var zip = $("#zip").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var card_type = $("#card-type").val();
                var card_number = $("#card-number").val();
                var card_cvc = $("#card-cvc").val();
                var exp_month = $("#exp-month").val();
                var exp_year = $("#exp-year").val();

                $.ajax({
                    type: 'POST',
                    url: 'include/register.php',
                    data: {
                        username: username,
                        password: password,
                        con_password: con_password,
                        firstname: firstname,
                        lastname: lastname,
                        gender: gender,
                        dob_day: dob_day,
                        dob_month: dob_month,
                        dob_year: dob_year,
                        street: street,
                        city: city,
                        state: state,
                        zip: zip,
                        email: email,
                        phone: phone,
                        card_type: card_type,
                        card_number: card_number,
                        card_cvc: card_cvc,
                        exp_month: exp_month,
                        exp_year: exp_year
                    },
                    cache: false,
                    success: function (value) {
                        var data = value.split(",");
                        chk = data[0];
                        $('#errorMsg').html(data[0]);
                        if (data[0] == "Registration complete") {
                            regis_com();
                        }
                    }
                });
                if (chk != "Registration complete") {
                    return false;
                }
            }
        }).modal("show");
    });
});

function regis_com() {
    $('#register-modal').modal("hide");
    $('#register-complete').modal("show");
    setTimeout(function () {
        $('#register-complete').modal("hide");
    }, 2000);
}