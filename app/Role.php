<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }

    /**
     * Assign a route access for the role.
     *
     * @param mixed $route
     *
     * @return mixed
     */
    public function assignRoutes($route)
    {
        return $this->routes()->attach($route);
    }
}
