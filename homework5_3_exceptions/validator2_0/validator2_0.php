<?php

namespace homework5_3_exceptions\validator2_0;

class User
{
    public $users;
    public $id;
    public $ids = [1, 2, 3, 4, 5];

    public function load($id)
    {
        if (! in_array($id, $this->ids)) {
            throw new \Exception('Пользователь не найден в базе данных', 300);
        } else {
            return true;
        }
    }

    public function Save($data)
    {
        if (mt_rand(0, 10) < 5) {
            $this->users[] = $data;
            return 'Пользователь успешно добавлен в БД';
        } else {
            throw new \Exception('Ошибка записи данных пользователя в БД', 300);
        }
        
    }
}


class Validator
{
    public static function emailValidate($email)
    {
        $email = trim($email);
        if (preg_match('/[а-яА-ЯёЁ]/', $email)) {
            return false;
        } else if (! strripos($email, '@')) {
            return false;
        } else if  (! strripos($email, '.') || strripos($email, '.') < strripos($email, '@')) {
            return false;
        } else {
            return true;
        }
    } 
}

class UserFormValidation{
    
    public function validate($post)
    {
        if ($post['name'] === '') {
            throw new \Exception('имя должно быть не пустым', 300);
        } else if ($post['age'] === '' || $post['age'] < 18) {
            throw new \Exception('возраст должен быть не менее 18 лет', 300);
        } else if (! Validator::emailValidate($post['email'])) {
            throw new \Exception('Емейл пользователя указан неверно', 300);
        } else {
            return 'Форма успешно отправлена';
        }
    }
}

if (! empty($_POST)) {
    try {
        $user = new User;
        $user->load($_POST['id']);
        (new UserFormValidation())->validate($_POST);
        $success = $user->save($_POST);
        echo($success);
    } catch (\Exception $e) {
        $error = $e->getMessage();
        echo($error);
    }
}
