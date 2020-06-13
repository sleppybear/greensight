<?php

class ControllerRegister extends Controller
{
    public function actionRegister()
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

            if ($name === '' || !filter_var($email, FILTER_SANITIZE_STRING)) {
                $error_fields[] = 'name';
            }

            if ($surname === '' || !filter_var($email, FILTER_SANITIZE_STRING)) {
                $error_fields[] = 'surname';
            }

            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_fields[] = 'email';
            }

            if (strlen($password) < 5 || !filter_var($email, FILTER_SANITIZE_STRING)) {
                $error_fields[] = 'password';
            }

            if ($password_confirm === '' || !filter_var($email, FILTER_SANITIZE_STRING)) {
                $error_fields[] = 'password_confirm';
            }

            if (!empty($error_fields)) {
                $response = [
                    'status' => false,
                    'errorType' => 1,
                    'message' => 'Некоторые поля формы заполненены неверно',
                    'fields' => $error_fields
                ];
                echo json_encode($response);
                die();
            }

            $check_user = $this->model->getUserData($email);

            if ($check_user) {

                $logText = $name.' '.$surname.' '.$email.' - пользователь не добавлен (email занят)';
                $this->logWrite($logText);

                $response = [
                    'status' => false,
                    'errorType' => 1,
                    'message' => 'Пользователь с таким Email уже существует',
                    'fields' => ['email']
                ];
                echo json_encode($response);
                die();
            }

            $logText = $name.' '.$surname.' '.$email.' - пользователь добавлен';
            $this->logWrite($logText);

            if ($password === $password_confirm) {

                //$password = md5($password);
                //$success = $db->query("INSERT INTO `users` (`name`, `surname`, `email`, `password`) VALUES ('$name', '$surname', '$email', '$password')");

                $success = true;

                if ($success) {

                    session_start();

                    $_SESSION['user'] = [
                        'name' => $name,
                        'surname' => $surname,
                        'email' => $email
                    ];

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
                    'errorType' => 1,
                    'message' => 'Введённые пароли не совпадают',
                    'fields' => ['password', 'password_confirm']
                ];
                echo json_encode($response);
            }
        }
    }

    private function logWrite($logText) {

        if (!file_exists('logs/')) {
            mkdir('logs');
        }

        $logFile = 'logs/register.log';
        $log = fopen($logFile, 'a+');

        if ($log) {
            $logText = date('d-m-Y H:i:s').' - '.$logText."\r\n";
            fwrite($log, $logText);
            fclose($log);
        }
    }
}