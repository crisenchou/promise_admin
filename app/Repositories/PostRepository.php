<?php namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Class PostRepository
 * @package App\Repositories
 */
class PostRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Post';
    }
}