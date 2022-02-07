<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Faker\Provider\Lorem;
use App\Models\Tag;

class TagController extends Controller
{
    public function createTag(){
        return $randomTag = Tag::create(['name'=>Lorem::words(asText:true)]);
    }
}
