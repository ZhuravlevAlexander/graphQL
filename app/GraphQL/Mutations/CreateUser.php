<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Str;

class CreateUser
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $user = new User();
        $user->name = $args['name'];
        $user->email = $args['email'];
        $user->password = \Hash::make($args['password']);
//        $user->api_token = Str::random(60);

        $user->save();

        return $user;
    }
}
