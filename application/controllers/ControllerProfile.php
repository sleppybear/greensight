<?php

class ControllerProfile extends Controller
{
    function actionProfile()
    {
        $this->view->generate('view_profile.php', 'view_template.php');
    }
}