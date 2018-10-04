<?php

namespace furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function cats() {
        return $this->hasMany('furbook\Cat', 'breed_id', 'id');
    }
}
