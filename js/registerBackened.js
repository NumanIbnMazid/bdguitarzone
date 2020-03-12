
    //Filter 1 ---

    // password validation ---
    $('#conPassword').on('keyup', function () {
        var x = $(this).val();
        if (x == $('#password').val() && x != "") {
            $('#message').html('Password Matched !').css('color', 'green');
        }
        else if (x=="") {
            $('#message').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
        else $('#message').html('Password Not Matching').css('color', 'red');
    });
    // first name validation ---
    $('#name').on('keyup', function () {
        var x = $(this).val();
        var validName = /^[a-zA-Z ][a-zA-Z ._\-]*$/;
        if (x.match(validName) && x.length>2) {
            $('#message2').html('Perfect !').css('color', 'green');
        }
        else if (x=="") {
            $('#message2').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
        else $('#message2').html('Please enter valid name').css('color', 'red');
    });
    // last name validation ---
    $('#lName').on('keyup', function () {
        var x = $(this).val();
        var validName = /^[a-zA-Z ][a-zA-Z ._\-]*$/;
        if (x.match(validName) && x.length>2) {
            $('#message3').html('Perfect ! You got a nice name !').css('color', 'green');
        }
        else if (x=="") {
            $('#message3').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
        else $('#message3').html('Please enter valid name').css('color', 'red');
    });
    // mobile validation ---
    $('#mobile').on('keyup', function () {
        var x = $(this).val();
        if ($(this).val().length == 11) {
            $('#message5').html('Perfect !').css('color', 'green');
        }
        else if (x=="") {
            $('#message5').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
        else $('#message5').html('Must be 11 characters').css('color', 'red');
    });
    // address validation ---
    $('#address').on('keyup', function () {
        var x = $(this).val();
        if ($(this).val().length > 9) {
            $('#message6').html('Perfect !').css('color', 'green');
        }
        else if (x=="") {
            $('#message6').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
        else $('#message6').html('Must be 10 characters or more').css('color', 'red');
    });

    // email validation ---
    $('#email').on('keyup', function () {
        var x = $(this).val();
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            $('#message7').html('Please enter valid email address').css('color', 'red');
        }
        else if (x=="") {
            $('#message7').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
        else $('#message7').html('Perfect!').css('color', 'green');
    });

    // password validation ---
    $('#password').on('keyup', function () {
        var x = $(this).val();
        var passStrong = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,50}$/;
        var passWeak1 = /^(?=.*[a-z])(?=.*[A-Z]).{7,50}$/;
        var passWeak2 = /^(?=.*)(?=.*).{7,50}$/;
        if (x.match(passStrong)) {
            $('#message8').html('Strong Password !').css('color', 'green');
        }
        else if (x.match(passWeak1)) {
            $('#message8').html('Medium !').css('color', 'LightGreen');
        }
        else if (x.match(passWeak2)) {
            $('#message8').html('Weak Password !').css('color', 'orange');
        }
        else if (x=="") {
            $('#message8').html('Blank !').css('color', 'red');
            x.focus();
            return false;
        }
         else $('#message8').html('Must be at least 7 characters').css('color', 'red');
    });


// password validation ---

// Registration Ajax ---
            $(document).ready(function () {
                $("#sub").click(function () {
                    var name                = $("#name").val();
                    var lName               = $("#lName").val();
                    var gender              = $("#gender").val();
                    var mobile              = $("#mobile").val();
                    var address             = $("#address").val();
                    var more                = $("#more").val();
                    var email               = $("#email").val();
                    var password            = $("#password").val();
                    var conPassword         = $("#conPassword").val();
                    var age                 = $("#age").val();
                    var post_cd             = $("#post_cd ").val();
                    $.post("signupBackened.php", {
                        name: name,
                        lName: lName,
                        gender: gender,
                        mobile: mobile,
                        address: address,
                        more: more,
                        email: email,
                        password: password,
                        conPassword: conPassword,
                        age: age,
                        post_cd: post_cd
                    }, function (data) {
                        $("#result").html(data);
                    });
                });
            });

    // Registration Ajax ---