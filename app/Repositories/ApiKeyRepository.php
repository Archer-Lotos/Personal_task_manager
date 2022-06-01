<?php

namespace App\Repositories;

use App\Interfaces\ApiKeyRepositoryInterface;
use App\Models\ApiKey;
use Illuminate\Support\Str;

class ApiKeyRepository implements ApiKeyRepositoryInterface
{

    public function getKey(): string
    {
        return Str::random(60);
    }

    public function createKey(object $user): object
    {
        if ($user->api_key()->exists()){
            return $user->api_key();
        } else {
            $api_key = new ApiKey();
            $api_key->key = $this->getKey();
            $api_key->user_id = $user->id;
            $api_key->save();
            return $api_key;
        }
    }
}
