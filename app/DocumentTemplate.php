<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'archived'
    ];
}
