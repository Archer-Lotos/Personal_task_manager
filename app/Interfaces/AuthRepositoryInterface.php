<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function registerUser(array $userDetails): object;
    public function setKey(object $user): object;
    public function dropKey(object $user): void;
}
