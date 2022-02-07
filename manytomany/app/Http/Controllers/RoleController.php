<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create($id)
    {
       return $user = User::findOrFail($id)->roles()->save(new Role(['name'=>'Administrator']));

    }

    public function read($user_id){
        $roles = User::findOrFail($user_id)->roles;

        foreach ($roles as $role) {
            echo $role->name;
        }
    }


    public function update($id){
       return $role = User::findOrFail($id)->roles()->whereName('Administrator')->first()->update(['name'=>'Scribe']);
        // return $role->update(['name'=>'Editor']);
    }

    public function delete($user_id){
        return User::findOrFail($user_id)->roles()->whereName('Scribe')->delete();
    }

    public function attach($user_id){
        return User::findOrFail($user_id)->roles()->attach(1);
    }

    public function detach($user_id){
        return User::findOrFail($user_id)->roles()->detach(1);
    }

}