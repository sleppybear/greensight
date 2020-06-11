<?php

class ControllerProfile extends Controller
{
    function actionProfile()
    {
        session_start();

        if (!empty($_SESSION['user'])) {

            $this->view->generate('view_profile.php','view_template.php');

            unset($_SESSION['user']);

        } else {

            header('Location: /register');

        }
    }
}