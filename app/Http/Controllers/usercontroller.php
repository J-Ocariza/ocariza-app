<?php

namespace App\Http\Controllers;
use App\Services\userServ;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index(userServ $userServ){
        return $userServ->listusers();
    }
}
