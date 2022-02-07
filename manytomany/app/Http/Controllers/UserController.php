<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createRandom(){
        $name = ['john', 'pete', 'phil', 'peter', 'philip', 'johan'];
        $email = ['jimes.jay@ymail.com','philJay@gm.com','johana@yahoo.com','jaypee@hotmail.com','pete@aol.com','john.phil@ym.com'];
        $stringSupply = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $stringLength = strlen($stringSupply) - 1;


        // Generate random name and emailto be inserted on each visit to the route

        $randomNameIndex = array_rand($name);
        $randomEmailIndex = array_rand($email);

        $randomName = $name[$randomNameIndex];
        $randomEmail = $email[$randomEmailIndex];

        // Generate random password

        $password = [];

        for ($counter = 0; $counter < 8; $counter++) {
            $stringSupplyIndex = rand(0, $stringLength);
            array_push($password, $stringSupply[$stringSupplyIndex]);
        }

        $password = implode($password);

        // Create random user

        $user = User::create(['name'=>$randomName, 'email'=>$randomEmail, 'password'=>$password]);
        if ($user) {
            return $user;
        }
    }
}