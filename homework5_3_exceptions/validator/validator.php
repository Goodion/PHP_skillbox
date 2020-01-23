<?php

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
        $success = (new UserFormValidation())->validate($_POST);
        echo($success);
    } catch (\Exception $e) {
        $error = $e->getMessage();
        echo($error);
    }
}
