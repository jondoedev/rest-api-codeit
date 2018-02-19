<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $guarded = array();
    public function setCreatedAtAttribute()
    {
        $this->attributes['unix_created_at'] = ((new \DateTime())->getTimestamp());

    }
}