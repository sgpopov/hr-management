<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'manager_id'
    ];

    /**
     * @return mixed
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Assign a team to the department.
     *
     * @param $team
     *
     * @return mixed
     */
    public function assignTeam($team)
    {
        return $this->teams()->attach($team);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
}
