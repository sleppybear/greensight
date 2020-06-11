<?php

class ControllerRegister extends Controller
{
    function actionRegister()
    {
        if (empty($_POST)) {

            $this->view->generate('view_register.php','view_template.php');

        } else {

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            $error_fields = [];

            $check_user = $this->model->getUserData($email);

            if ($check_user) {
                $response = [
                    'status' => false,
                    'errorType' => 1,
                    'message' => 'Пользователь с таким Email уже существует',
                    'fields' => ['email']
                ];
                echo json_encode($response);
                die();
            }

            if ($name === '') {
                $error_fields[] = 'name';
            }

            if ($surname === '') {
                $error_fields[] = 'surname';
            }

            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_fields[] = 'email';
            }

            if ($password === '') {
                $error_fields[] = 'password';
            }

            if ($password_confirm === '') {
                $error_fields[] = 'password_confirm';
            }

            if (!empty($error_fields)) {
                $response = [
                    'status' => false,
                    'errorType' => 1,
                    'message' => 'Проверьте правильность полей',
                    'fields' => $error_fields
                ];
                echo json_encode($response);
                die();
            }

            if ($password === $password_confirm) {

                //$password = md5($password);
                //$success = $db->query("INSERT INTO `users` (`name`, `surname`, `email`, `password`) VALUES ('$name', '$surname', '$email', '$password')");

                $success = 1;

                if ($success) {
                    $response = [
                        'status' => true,
                        'message' => 'Регистрация прошла успешно'
                    ];
                    echo json_encode($response);
                } else {
                    $response = [
                        'status' => false,
                        'errorType' => 2,
                        'message' => 'Ошибка добавления в базу данных' //$db->error
                    ];
                    echo json_encode($response);
                }
            } else {
                $response = [
                    'status' => false,
                    'errorType' => 3,
                    'message' => 'Введённые пароли не совпадают'
                ];
                echo json_encode($response);
            }

        }
    }
}