<?php

class ModelRegister extends Model
{
	public function getUserData($userEmail)
	{
	    $users = array(
	        array(
                'name' => 'Родион',
                'surname' => 'Раскольников',
                'email' => 'rodion@mail.com',
                'password' => '123'
            ),
            array(
                'name' => 'Лев',
                'surname' => 'Мышкин',
                'email' => 'lev@mail.com',
                'password' => '123'
            ),
            array(
                'name' => 'Алексей',
                'surname' => 'Карамазов',
                'email' => 'alexey@mail.com',
                'password' => '123'
            )
        );
	    $userData = false;
	    foreach ($users as $user) {
	        if($user['email'] == $userEmail) {
	            $userData = $user;
            }
        }
		return $userData;
	}
}
