<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12">
            <form class="mt-5 p-3 rounded bg-dark">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Имя">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="surname" placeholder="Фамилия">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Пароль">
                    <small class="form-text text-muted">*пароль должен содержать не менее 5 симфолов</small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirm" placeholder="Повторите пароль">
                </div>
                <div class="text-center">
                    <button type="button" id="register" class="btn btn-primary mt-2 align-self-center">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ошибка</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-3">
                <p class="text-center font-weight-bold">Error Message</p>
            </div>
        </div>
    </div>
</div>