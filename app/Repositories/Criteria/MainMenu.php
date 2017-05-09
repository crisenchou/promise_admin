<?php namespace App\Repositories\Criteria;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

/**
 * Class MainMenu
 *
 * @package App\Repositories\Criteria
 */
class MainMenu extends Criteria
{

    /**
     * @param            $model
     * @param Repository $repository
     *
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model->where('parent_id', 0);
        return $model;
    }
}