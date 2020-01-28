$("#sendMail").on("click", function() {

    var email = $("#email").val().trim();
    var name = $("#name").val().trim();
    var phone = $("#phone").val().trim();
    var message = $("#message").val().trim();


    if (email.length < 2) {
        $("#errorMessage").text("Введите email");
        return false;
    }
    if (name == "" || name.length < 2) {
        $("#errorMessage").text("Имя должно быть больше 2 символов");
        return false;
    }
    if (phone == "" || phone.length < 6) {
        $("#errorMessage").text("Введите номер телефона");
        return false;
    }
    if (message.length < 5) {
        $("#errorMessage").text("Введите сообщение не менее 5 символов");
        return false;
    }

    $("#errorMessage").text("");

    $.ajax({
        url: 'components/Mail.php',
        type: 'POST',
        cache: false,
        data: {
            'email': email,
            'name': name,
            'phone': phone,
            'message': message,
        },
        dataType: 'html',
        beforeSend: function() {
            $("#sendMail").prop("disable", true);

        },
        success: function(data) {
            if (!data) {
                alert("Были ошибки, сообщение не отправлено!");
            } else {
                $("#mailForm").trigger("reset");
                alert("Сообщение было отправлено!");
            }
            $("#sendMail").prop("disable", false);
        }
    });
});