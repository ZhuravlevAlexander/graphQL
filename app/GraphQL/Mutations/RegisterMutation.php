<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterMutation extends Mutation {

    protected $attributes = [
        'name' => 'RegisterMutation'
    ];

    public function args(): array {
        return [
            'displayName' => ['type' => Type::string()],
            'email' => ['type' => Type::string()],
            'password' => ['type' => Type::string()]
        ];
    }

    public function type(): Type {
        return Type::string();
    }

    public function resolve($root, $args) {

        $user = User::create([
            'name' => $args['displayName'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
            'api_token' => Str::random(60)
        ]);

        return $user->api_token;
    }
}
