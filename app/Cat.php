<?php

namespace furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    /**
     * White list column of cats table
     */
    protected $fillable = [
        'name',
        'date_of_birth',
        'breed_id',
    ];

    public function breed() {
        return $this->belongsTo('furbook\Breed', 'breed_id', 'id');
    }
}
