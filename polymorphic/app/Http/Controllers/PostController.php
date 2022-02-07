<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Post;

use Faker\Provider\Lorem;

class PostController extends Controller
{
    public function createPost(){

        // Get a random Tag... 
        
        $randomTagIndex = array_rand(Tag::all()->toArray());

        $randomTag = Tag::find($randomTagIndex + 1);

        $post = Post::create(['name'=>Lorem::paragraph()]);

        // ...associate the Video model with the random Tag 

        return $post->tags()->save($randomTag);

    }

    public function readPost($id){
        return Post::findOrFail($id)->tags;
    }

    public function updatePost($id){

        $posts = Post::findOrFail($id);

        foreach ($posts->tags as $tag) {
            $tag->name = 'New Tag' . Lorem::words(asText:true);
        }

        return $posts;

        // return Post::findOrFail($id)->update(['name'=>'Update ' . Lorem::paragraph()]);
    }
}
