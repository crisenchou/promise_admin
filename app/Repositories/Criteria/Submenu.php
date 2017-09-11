<?php namespace App\Repositories\Criteria;

use Crisen\Repositories\Criteria\Criteria;
use Crisen\Repositories\Contracts\RepositoryInterface as Repository;

/**
 * Class Submenu
 *
 * @package App\Repositories\Criteria
 */
class Submenu extends Criteria
{

    /**
     * @param            $model
     * @param Repository $repository
     *
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model->with('subMenu');
        return $model;
    }
}