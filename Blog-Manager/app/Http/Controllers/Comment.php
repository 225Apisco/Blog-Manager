<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Comment extends Controller
{
        public function comment()
    {
        return $this->hasMany(comment::class);
    }
}
