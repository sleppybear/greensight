/*
    Регистрация
 */
$('#register').click(function () {

    let name = $('input[name="name"]').val(),
        surname = $('input[name="surname"]').val(),
        email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

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
            if (data.status) {
                document.location.href = '/profile';
            } else {
                if (data.errorType === 1) {
                    data.fields.forEach(function (field) {
                        $(`.form-control[name="${field}"]`).addClass('red-field');
                     })
                }
                $('.modal-body > p').text(data.message);
                $('.modal').modal();
            }
            $('#register').prop('disabled', false)
        }
    });
});

/*
    Отключение выделения поля с ошибкой ввода
 */
$('.form-control').focus(function(event){

    color = $(`.form-control[name="${event.target.name}"]`).removeClass('red-field');
});