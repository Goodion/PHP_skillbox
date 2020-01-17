<?php

namespace client_notice;

class User
{
    public function __construct($name, $email, $sex = '', $age = '', $phone= '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->sex = $sex;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function notifyOnEmail($message)
    {
        if ($this->censor($message)) {
            $this->connectionType = 'на почту ' . $this->email;
            $this->send($message, $this->connectionType);
        }
    }

    public function notifyOnPhone($message)
    {
        if ($this->censor($message) && $this->phone) {
            $this->connectionType = 'на телефон ' . $this->phone;
            $this->send($message, $this->connectionType);
        }
    }

    public function notify($message)
    {
        if ($this->censor($message)) {
            if ($this->email) {
                $this->notifyOnEmail($message);
            }

            if ($this->phone) {
                $this->notifyOnPhone($message);
            }
        }
    }

    protected function censor($age)
    {
        if ($this->age < 18) {
            echo('Возраст пользователя должен быть больше 18 лет!<br />');
        } else {
            return true;
        }
    }

    public function send($message, $connectionType)
    {
        echo('Уведомление клиенту ' . $this->name . ', которому ' . $this->age . ' лет отправлено ' . $this->connectionType . ' : ' . $message . '<br />');
    }
}

$newUser = new User('Клиент1', 'asd@asdf.com', 'male', '19', '389374989988');
$newUser1 = new User('Пётр', 'asdf@asdf.com', 'female', '15', '3242223423');
$newUser2 = new User('Сеня', 'xcvxx@asdf.com', 'male', '21', '53212345');
$newUser3 = new User('Олег', 'xcvsw@asdf.com', 'male', '35', '23465345');

$newUser->notify('Добрый день, клиент. У Вас всё хорошо.');
$newUser1->notify('Добрый день, клиент. У Вас всё плохо.'); 
$newUser2->notify('Добрый день, клиент. У Вас всё хорошо.'); 
$newUser3->notify('Добрый день, клиент. У Вас всё хорошо.');
