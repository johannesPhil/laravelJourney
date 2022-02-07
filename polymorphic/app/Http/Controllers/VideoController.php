<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Lorem;

use App\Models\Video;
use App\Models\Tag;



class VideoController extends Controller
{

    public function createVideo(){
    
        // Get a random Tag...  

        $randomTagIndex = array_rand(Tag::all()->toArray());

        $randomTag = Tag::find($randomTagIndex + 1);

        $video = Video::create(['name'=>Lorem::words(asText:true) . '.mkv']);


        // ...associate the Video model with the random Tag  

        return $video->tags()->save($randomTag);

    }

}
