<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilters
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * Filters constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get all request filters data.
     *
     * @return array
     */
    public function filters() : array
    {
        return $this->request->all();
    }

    /**
     * Apply the filters to the builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function apply(Builder $builder) : Builder
    {
        $this->builder = $builder;

        $filters = $this->filters();

        foreach ($filters as $filter => $value) {
            $filter = ucfirst($filter);
            $method = "filterBy{$filter}";

            if (!method_exists($this, $method)) {
                continue;
            }

            if (strlen($value)) {
                $this->$method($value);
            } else {
                $this->$method();
            }
        }

        return $this->builder;
    }
}
