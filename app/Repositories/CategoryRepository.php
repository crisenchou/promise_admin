<?php namespace App\Repositories;


use Crisen\Repositories\Contracts\RepositoryInterface;
use Crisen\Repositories\Eloquent\Repository;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return \App\Category::class;
    }
}