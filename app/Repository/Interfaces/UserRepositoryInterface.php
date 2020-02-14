<?php

namespace App\Repository\Interfaces;

use App\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interfaces EloquentRepositoryInterface
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes): User;

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): ? string;

    /**
     * @return  mixed
     */
    public function get(): ? string;
}
