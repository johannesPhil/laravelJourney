<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class PhotoController extends Controller
{

    public function createPhoto($id){

        $photo_path = 'https://picsum.photos/200';
       return Staff::findOrFail($id)->photos()->create(['path'=>$photo_path]);
    }

    public function readPhoto($id){
        return Staff::findOrFail($id)->photos()->first();
    }

    public function updatePhoto($id){
        return Staff::findOrFail($id)->photos()->update(['path'=>'newImge.png']);
    }

    public function deletePhoto($id){
        return Staff::findOrFail($id)->photos()->first()->delete();
    }
}
