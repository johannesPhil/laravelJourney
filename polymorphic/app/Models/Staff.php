<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    public function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }
}
