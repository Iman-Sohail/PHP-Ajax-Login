$(document).ready(function () {

    // Email Validation
    function IsEmail(email) {
        var regex =
        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }

    // $(document).on('click','#submitGetInfo',function(){

    //     var errorChckGetInfoFrm = "";
    //     $(".getInfoFromCheckInput").each(function () {
    //         var frGetInfoInpt = $(this).val();
    //         var frGetInfoInptAttr = $(this).attr("getInfoInputAttr");
    //         if (frGetInfoInpt == "") {
    //             errorChckGetInfoFrm += frGetInfoInptAttr + "<br/>";
    //         }
    //     });

    //     var nameInputVal = $('#detailInputName').val();
    //     var emailInputVal = $('#detailInputEmail').val();
    //     var phoneInputVal = $('#detailMobileNumber').val();
    //     var projectIdInputVal = $('#projectId').val();

    //     if ($("#detailInputEmail").val().length) {
    //         if (IsEmail(emailInputVal) == false) {
    //             errorChckGetInfoFrm += "Invalid Email\n<br/>";
    //         }
    //     }

    //     if ($("#detailMobileNumber").val().length) {
    //         if (IsPhone(phoneInputVal) == false) {
    //             errorChckGetInfoFrm += "Invalid Phone No\n<br/>";
    //         }
    //     }
        
    //     if ($('#projectId').val() == null) {
    //         Swal.fire({
    //             icon: 'error',
    //             text: 'Please refresh the page and then try again',
    //         })
    //     }

    //     if (errorChckGetInfoFrm != "") {
    //         // alert('Please Fill The Below Fields:\n'+errorChckGetInfoFrm);
    //         Swal.fire({
    //             icon: "error",
    //             title: "Please Fill The Below Fields:",
    //             html: errorChckGetInfoFrm,
    //         });
    //         return false;

    //     }

    //     var data = {
    //         'name_val': nameInputVal,
    //         'email_val': emailInputVal,
    //         'phone_val': phoneInputVal,
    //         'projectId_val': projectIdInputVal,
    //     };

    //     $('#buy-loader').removeClass('d-none');

    //     $.ajax({
    //         url: '/infoSend',
    //         type: 'POST',
    //         beforeSend: function (xhr) {
    //             var token = $('meta[name="csrf_token"]').attr('content');
                
    //             if (token) {
    //                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
    //             }
    //         },
    //         data: data,
    //         success: function (response) {
    //             $('#buy-loader').addClass('d-none');
    //             $('#form-success').removeClass('d-none');
    //             $('#detailInputName').val('');
    //             $('#detailInputEmail').val('');
    //             $('#detailMobileNumber').val('');
    //         },
    //         error: function (result) {
    //             Swal.fire({
    //                 icon: "error",
    //                 title: "Some Error",
    //             });
    //             $('#buy-loader').addClass('d-none');
    //             return false;                
    //         }
    //     });
    // });

    $(document).on('click','#loginBtn',function(){

        var loginEmail = $('#LoginInputEmail').val();
        var loginPass = $('#loginInputPass').val();

        if ($("#LoginInputEmail").val().length) {
            if (IsEmail(loginEmail) == false) {
                Swal.fire({
                    icon: "error",
                    title: "Invalid Email",
                    text: "The Email you provided is invalid please enter valid email"
                });
                return false;
            }
        }

        if (loginEmail == '') {
            Swal.fire({
                icon: "error",
                title: "Email empty",
                text: "Email can't be empty please enter email and then try again"
            });
            return false;
        }

        if (loginPass == '') {
            Swal.fire({
                icon: "error",
                title: "Password empty",
                text: "Password can't be empty please enter Password and then try again"
            });
            return false;
        }

        var data = {
            'email_val': loginEmail,
            'pass_val': loginPass
        };

        $('#loginBtnLoader').removeClass('d-none');
        $('#loginBtn').addClass('d-none');

        $.ajax({
            url: './ajax/login.ajax.php',
            type: 'POST',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: data,
            success: function (response) {

                $('#loginBtnLoader').addClass('d-none');
                $('#loginBtn').removeClass('d-none');

                if (response == "user doesn't exists") {
                    Swal.fire({
                        icon: "error",
                        title: "User doesn't exist",
                        text: "The credential you provided doesn't match any user please enter correct credentials and then try again"
                    });
                    return false;
                }

                if (response == "login successfully") {
                    window.location.assign('./index');
                }

                if (response == "login success") {
                    window.location.assign('./admin/index');
                }

                $('#LoginInputEmail').val('');
                $('#loginInputPass').val('');


            },
            error: function (result) {
                Swal.fire({
                    icon: "error",
                    title: "Some Error",
                });
                $('#loginBtnLoader').addClass('d-none');
                $('#loginBtn').removeClass('d-none');
                return false;                
            }
        });

    });

    $(document).on('click','#registerBtn',function(){

        var registerName = $('#registerInputName').val();
        var registerEmail = $('#registerInputEmail').val();
        var registerPass = $('#registerInputPass').val();

        if ($("#registerInputEmail").val().length) {
            if (IsEmail(registerEmail) == false) {
                Swal.fire({
                    icon: "error",
                    title: "Invalid Email",
                    text: "The Email you provided is invalid please enter valid email"
                });
                return false;
            }
        }

        if (registerName == '') {
            Swal.fire({
                icon: "error",
                title: "Name empty",
                text: "Name can't be empty please enter name and then try again"
            });
            return false;
        }

        if (registerEmail == '') {
            Swal.fire({
                icon: "error",
                title: "Email empty",
                text: "Email can't be empty please enter email and then try again"
            });
            return false;
        }

        if (registerPass == '') {
            Swal.fire({
                icon: "error",
                title: "Password empty",
                text: "Password can't be empty please enter Password and then try again"
            });
            return false;
        }

        var data = {
            'name_val': registerName,
            'email_val': registerEmail,
            'pass_val': registerPass
        };

        $('#registerBtnLoader').removeClass('d-none');
        $('#registerBtn').addClass('d-none');

        $.ajax({
            url: './ajax/register.ajax.php',
            type: 'POST',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: data,
            success: function (response) {

                $('#registerBtnLoader').addClass('d-none');
                $('#registerBtn').removeClass('d-none');

                if (response == "user exists") {
                    Swal.fire({
                        icon: "error",
                        title: "User exist",
                        text: "The credentials you provided already belongs to a user please user other credentials or login"
                    });
                    return false;
                }

                $('#registerInputName').val('');
                $('#registerInputEmail').val('');
                $('#registerInputPass').val('');

                if (response == "registered successfully") {
                    window.location.assign('./login');
                }

            },
            error: function (result) {
                Swal.fire({
                    icon: "error",
                    title: "Some Error",
                });
                $('#registerBtnLoader').addClass('d-none');
                $('#registerBtn').removeClass('d-none');
                return false;                
            }
        });

    });

    $(document).on('click','#logoutBtn',function(){

        $.ajax({
            url: './ajax/logout.ajax.php',
            type: 'POST',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function (response) {

                if (response == "logout success") {
                    window.location.assign('./login');
                }

            },
            error: function (result) {
                Swal.fire({
                    icon: "error",
                    title: "Some Error",
                });
                return false;                
            }
        });

    });
});