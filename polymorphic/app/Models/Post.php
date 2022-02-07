<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Post morphs to many (many-to-many) Tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        // morphToMany(RelatedModel, morphName, pivotTable = ables, thisKeyOnPivot = able_id, otherKeyOnPivot = tag_id)
        return $this->morphToMany(Tag::class, 'tagable');
    }
}
