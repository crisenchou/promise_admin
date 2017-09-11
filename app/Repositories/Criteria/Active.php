<?php namespace App\Repositories\Criteria;

use Crisen\Repositories\Criteria\Criteria;
use Crisen\Repositories\Contracts\RepositoryInterface as Repository;

/**
 * Class Active
 *
 * @package App\Repositories\Criteria
 */
class Active extends Criteria {

    /**
     * @param            $model
     * @param Repository $repository
     *
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('status','>',0);
        return $query;
    }
}