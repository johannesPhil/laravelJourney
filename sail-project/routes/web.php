<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Taggables;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostsController::class, 'contact']);

Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/posts/{name}', [PostsController::class, 'index']);
// Route::get('post/{id}', [PostsController::class, 'showPost']);


Route::get('/home', [PostsController::class, 'showHome']);


/*
|--------------------------------------------------------------------------
| RAW SQL INTERACTION WITH DATABASE
|--------------------------------------------------------------------------
*/

Route::get('/insert', function () {
    DB::insert('INSERT INTO posts(user_id,title, content,isAdmin) VALUES (?,?,?,?)', [1,'Databases', 'Trying out raw SQL insertion', false]);
});

Route::get('/read', function () {
    $posts = [];

    $results = DB::select('select * from posts');

    // return $results;

    foreach ($results as $post) {
        echo $post->title;
    }
});

Route::get('/update', function () {
    $updated = DB::update('update posts set title = "New title" where id = ?', [3]);
    return $updated;
});

Route::get('/delete', function () {
    DB::delete('delete from posts where id = ?', [8]);
});

/*
|--------------------------------------------------------------------------
| ELOQUENT ORM INTERACTION WITH DATABASE
|--------------------------------------------------------------------------
*/

Route::get('/read_el', function () {
    $posts = Post::all();

    foreach ($posts as $post) {
        echo($post->title)."\n";
    }
});


Route::get('/find', function () {
    $post = Post::find(2);
    return $post->content;
});

Route::get('/findWhere', function () {
    $posts = Post::where('id', '>', 0)->orderBy('title', 'desc')->get();
    foreach ($posts as $post) {
        echo $post->title .">=";
    }
});

Route::get('/fail', function () {
    $post = Post::where('id', 7)->firstOrFail();
    return $post;
});

Route::get('/insert_el', function () {
    $post = new Post();
    $post->user_id= 1;
    $post->title = 'Eloquent Insertion';
    $post->content = 'Let\'s see how smooth this insertion goes';

    $post->save();
});

Route::get('/create', function () {
    Post::create(['title' =>'Create','content' =>'Trying out mass assignment']);
});

Route::get('/update_el', function () {
    // Tag::find(2)->update(['name'=>'Post Tag']);
    // $counter = 1;

    // $users= User::where('country_id', 0)->get();

    // foreach ($users as $user) {
    //     $user->update(['country_id'=>$counter, 'updated_at'=>now()]);
    //     $counter++;
    // }

    // return $users;

    // $posts = Post::where('isAdmin', 0)->get();

    // foreach ($posts as  $post) {
    //     $post->update(["title"=>"Update $counter","content" =>"Updating content with foreach and adding $counter"]);
    //     $counter++;
    // }

    // $now = Carbon::now();
    // echo $now;

    // $updatePost = Post::updateOrCreate(['user_id'=>1],['created_at'=>now(),'updated_at'=>now()]);
    // return $updatePost;

    // return Post::where('title','Databases')->update(['created_at'=>NULL,'updated_at'=>NULL]);
});

Route::get('/delete', function () {
    // Post::find(1)->delete();

    // $deletedPosts = Post::where('created_at', NULL)->delete();
    // return $deletedPosts;
});

Route::get('/softDelete', function () {
    /*
    |--------------------------------------------------------------------------
    | Populate the deleted_at column with the timestamp the delete command was given
    |
    |--------------------------------------------------------------------------
    */
    Post::find(4)->delete();
});

Route::get('/readSoftDelete', function () {
    //Return records that don't have their deleted_at column populated
    // return Post::withoutTrashed()->where('isAdmin', 0)->get();

    //Return records that have been soft deleted
    return Post::onlyTrashed()->where('isAdmin', 0)->get();

    //Return all records even with populated deleted_at column
    // return Post::withTrashed()->where('isAdmin', 0)->get();


    /*
|--------------------------------------------------------------------------
| A raw mysql query will return all records as long as they are in the table
|
|--------------------------------------------------------------------------
*/
});


Route::get('/restoreDeleted', function () {
    return Post::withTrashed()->where('isAdmin', 0)->restore();
});


Route::get('/forceDelete', function () {
    return Post::where('deleted_at', '!=', null)->forceDelete();
});

Route::get('/insertUser', function () {
    User::create(['name' =>'Jimes', 'email' =>'jimes@gmail.com', 'password' =>'dande']);
});

Route::get('/createRole', function () {
    Role::create(['name'=>'Admin']);
    Role::create(['name'=>'Editor']);
    Role::create(['name'=>'Subscriber']);
});


Route::get('/insertCountries', function () {
    Country::create(['name'=>'Angola']);
    Country::create(['name'=>'Barbados']);
    Country::create(['name'=>'Turkey']);
    Country::create(['name'=>'Pakistan']);
});

Route::get('/insertPhotos', function () {
    Photo::create(['path'=>'https://picsum.photos/200/300?random=1','imageable_id'=>1,'imageable_type'=>User::class]);
    Photo::create(['path'=>'https://picsum.photos/200/300?random=2','imageable_id'=>2,'imageable_type'=>Post::class]);
});


Route::get('/insertVideos', function () {
    Video::create(['name'=>'intro_doc.mkv']);
    Video::create(['name'=>'lastDance.avi']);
});

Route::get('/insertTag', function () {
    Tag::create(['name'=>'Intro']);
    Tag::create(['name'=>'Programming']);
});

Route::get('insertTaggables', function () {
    Taggables::create(['tag_id'=>1,'taggable_id'=>1,'taggable_type'=>Video::class]);
    Taggables::create(['tag_id'=>2, 'taggable_id'=>1,'taggable_type'=>Post::class]);
});



/*
|--------------------------------------------------------------------------
| Eloquent relatonships
|--------------------------------------------------------------------------
*/

// One to One
Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post;
});

// One to One inverse

Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user;
});


// One to Many
Route::get('/user/{id}/posts', function ($id) {
    $posts = User::find($id)->posts;

    foreach ($posts as $post) {
        echo $post->content . "<br>";
    }
});


Route::get('/user/{id}/role', function ($id) {
    $userRole = User::find($id)->roles;
    return $userRole;
});


Route::get('/role/{id}/users', function ($id) {
    $users = Role::find($id)->users;
    return $users;
});

Route::get('/user/pivot', function () {
    $users = User::find(1);

    foreach ($users->roles as $role) {
        echo $role->pivot->created_at;
    }
});



Route::get('user/country', function () {
    $posts = Country::find(1)->posts;
    foreach ($posts as $post) {
        echo $post->title . '<br>';
    }
});


Route::get('photo/{id}/user', function ($id) {
    $photo = Photo::findOrFail($id);
    return $photo->imageable_type::find($id)->get();
});


Route::get('/postTag', function () {
    $query = Post::find(1);

    foreach ($query->tags as $tag) {
        echo $tag->name;
    }
});


Route::get('/tag/post', function(){
   $query = Tag::find(2)->posts;

   foreach($query as $post){
        echo $post->content;
   }
});