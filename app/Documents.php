<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'employee_id', 'template_id'
    ];
}
