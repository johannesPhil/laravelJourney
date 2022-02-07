<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(){
        $sampleTitle = (Lorem::words(asText:true));
        $sampleBody = implode(Lorem::paragraphs());

        $post = new Post(['title'=>$sampleTitle, 'content'=>$sampleBody]);

        return $user = User::findOrFail(1)->posts()->save($post);
    }

    public function read($user_id){
        return $postsCollection = User::findOrFail($user_id)->posts;

        foreach ($postsCollection as $post) {
            echo $post->content . '<br><br>';
        }
    }

    public function update($id){

        // $post = Post::findOrFail($id);

        // $post->content = implode(Lorem::paragraphs());
        // return $post = $post->save();
        return $post = User::findOrFail(1)->posts()->whereId($id)->update(['content'=>Lorem::words(asText:true)]);
    }

    public function delete($id){
        return User::findOrFail(1)->posts()->whereId($id)->delete();
    }
}
