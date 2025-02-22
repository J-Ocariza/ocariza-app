<?php

namespace App\Services;

class userServ{
    protected $users;

    public function __construct($users){
        $this -> users = $users;
    }

    public function listusers(){
        return $this -> users;
    }
}