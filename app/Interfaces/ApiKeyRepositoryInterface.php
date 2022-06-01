<?php

namespace App\Interfaces;

interface ApiKeyRepositoryInterface
{
    public function getKey(): string;
    public function createKey(object $user): object;
}
