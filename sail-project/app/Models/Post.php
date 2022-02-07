<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $date = ['deleted_at'];
    protected $fillable = ['title', 'content', 'created_at', 'updated_at'];

    // Many to many relationship
    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }


    // Polymorphic relationship
    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }


    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}