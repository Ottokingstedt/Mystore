<?php 
require_once __DIR__ . "/Database.php";

class Message{
    public $id;
    public $user_id;
    public $firstname;
    public $lastname;
    public $email;


public function __construct($user_id, $firstname, $lastname, $email, $id = 0)
{
    if($id > 0){
        $this->id = $id;
    }

    $this->user_id = $user_id;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    }
}