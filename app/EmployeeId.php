<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeId extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'number', 'issue_by', 'issue_date', 'valid_until',
        'address'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
