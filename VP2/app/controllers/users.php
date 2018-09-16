<?php

namespace App;

class Users extends MainController
{

    public function showUserList()
    {
        $users_model = new User();
        $users = $users_model->all();

        for ($i = 0; $i < count($users); $i++) {
            $users[$i] = $users[$i] . "changed";
        }

        $data['users'] = $users;
        $data['username'] = 'Sergej';
        $this->view->render('users/userlist', $data);
    }

    public function showFirstUser()
    {

        $users_model = new User();
        $user = $users_model->first();

        $data['user'] = $user;

        $this->view->render('users/userfirst', $data);
    }
}