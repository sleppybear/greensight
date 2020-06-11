/*
    Регистрация
 */
$('#register').click(function () {

    //event.preventDefault();

    let name = $('input[name="name"]').val(),
        surname = $('input[name="surname"]').val(),
        email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    //console.log(name, surname, email, password, password_confirm);

    $.ajax({
        url: '/register',
        type: 'POST',
        dataType: 'json',
        data: {
            name: name,
            surname: surname,
            email: email,
            password: password,
            password_confirm: password_confirm
        },
        beforeSend: function() {
            $('#register').prop('disabled', true);
        },
        success: function (data) {
            console.log(data);
            if (data.status) {
                document.location.href = '/profile';
            } else {
                if (data.errorType === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    })
                }
                //$('.message').removeClass('hide').text(data.message);
                alert(data.message);
            }
            $('#register').prop('disabled', false)
        }
    });
});