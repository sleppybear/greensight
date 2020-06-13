<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12">
            <div class="mt-5 p-3 rounded bg-dark text-light text-center">
                <p class="my-2">Регистрация прошла успешно!</p>
                <div class="my-4 p-2 rounded user-info-container">
                    <h4 class="my-1"><?php
                        echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname']; ?></h4>
                    <h6 class="my-1"><?php
                        echo $_SESSION['user']['email']; ?></h6>
                </div>
                <a href="/">Greensight</a>
            </div>
        </div>
    </div>
</div>