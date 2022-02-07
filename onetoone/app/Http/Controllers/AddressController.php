<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function insert(){
        $user  = User::findOrFail(1);

        $address= new Address(['name'=>'13, Otesuku Street, IB']);

        $user->address()->save($address);

        return $address;
    }


    public function update(){
        $address = Address::whereUserId(1)->first();

        $address->name = '5A, Busari Street';

        $address->save();

        return $address;
    }


    public function read(){
        $user = User::findOrFail(1);

        return $user->address->name;
    }


    public function delete(){
        $user = User::findOrFail(1);
        return $deleted = $user->address()->first()->delete();

    }
}
