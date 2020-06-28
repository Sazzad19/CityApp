<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentRatting extends Model
{
    protected $fillable = [
       'user_id', 'ratting', 'comment', 'place_id'
    ];
}
