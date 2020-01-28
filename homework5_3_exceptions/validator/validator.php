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

class UserFormValidation
{
    public function validate($post)
    {
        if ($post['name'] === '') {
            throw new \Exception('имя должно быть не пустым');
        } else if ($post['age'] === '' || $post['age'] < 18) {
            throw new \Exception('возраст должен быть не менее 18 лет');
        } else if (! Validator::emailValidate($post['email'])) {
            throw new \Exception('Емейл пользователя указан неверно');
        } else {
            return true;
        }
    }
}

if (! empty($_POST)) {
    try {
        $success = (new UserFormValidation())->validate($_POST);
        echo 'Форма успешно отправлена';
    } catch (\Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
}
