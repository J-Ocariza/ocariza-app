<?php

namespace App\Http\Controllers;
use App\Services\userServ;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index(userServ $userServ){
        return $userServ->listusers();
    }

    public function first(userServ $userServ){
        return collect($userServ->listusers())->first();
    }

    public function show(userServ $userServ,$id){
        $user = collect($userServ ->listusers())->filter(function($item) use ($id){
            return $item['id'] == $id;
        })->first();
        return $user;
    }
}
