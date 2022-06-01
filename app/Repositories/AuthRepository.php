<?php

namespace App\Repositories;

use App\Interfaces\{
    ApiKeyRepositoryInterface,
    AuthRepositoryInterface
};
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    private ApiKeyRepositoryInterface $key;

    public function __construct(ApiKeyRepositoryInterface $key) {
        $this->key = $key;
    }

    public function registerUser(array $userDetails): object
    {
        $user = new User();
        $user->name = $userDetails['name'];
        $user->password = Hash::make($userDetails['password']);
        $user->email = $userDetails['email'];
        $user->save();
        return $this->setKey($user);
    }

    public function setKey(object $user): object
    {
        $this->key->createKey($user);
        return $user;
    }

    public function dropKey(object $user): void
    {
        $user->api_key()->delete();
    }
}
