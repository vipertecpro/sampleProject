<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\UserRepositoryInterface;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->get();
        return view('admin.pages.users.index', [
            'users' => $users
        ]);
    }
    public function view($user_id)
    {
        $users = $this->userRepository->find($user_id);
        return view('admin.pages.users.view', [
            'users' => $users
        ]);
    }
}
