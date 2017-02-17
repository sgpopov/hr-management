<?php

namespace App\Employees;

use App\Helpers\QueryFilters;

class Filters extends QueryFilters
{
    /**
     * @param null $departmentId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filterByDepartment($departmentId = null)
    {
        if (is_null($departmentId)) {
            return $this->builder;
        }

        return $this->builder->whereHas('team', function ($team) use ($departmentId) {
            return $team->where('department_id', '=', $departmentId);
        });
    }

    /**
     * Filter by employee team.
     *
     * @param int|null $teamId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filterByTeam($teamId = null)
    {
        if (is_null($teamId)) {
            return $this->builder;
        }

        return $this->builder->where('team_id', '=', $teamId);
    }
}
