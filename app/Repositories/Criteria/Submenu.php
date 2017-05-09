<?php namespace App\Repositories\Criteria;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

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