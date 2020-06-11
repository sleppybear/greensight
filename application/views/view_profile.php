<div class="profile">
    <p style="color: black">Регистрация прошла успешно!</p>
    <div class="user_info">
        <p><?php echo $_SESSION['user']['name'].' '.$_SESSION['user']['surname']; ?></p>
    </div>
    <div class="user_info">
        <p><?php echo $_SESSION['user']['email']; ?></p>
    </div>
    <a href="/">Greensight</a>
</div>
