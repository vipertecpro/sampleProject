<?php

namespace App\Repository\Eloquent;

use App\Repository\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return User
     */
    public function create(array $attributes): User
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): ? string
    {
        return $this->model->findOrFail($id)->toJson();
    }

    /**
     * @return mixed
     */
    public function get() : string
    {
        return $this->model->get()->toJson();
    }
}
