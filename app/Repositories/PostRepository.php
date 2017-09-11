<?php namespace App\Repositories;

use Crisen\Repositories\Contracts\RepositoryInterface;
use Crisen\Repositories\Eloquent\Repository;

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