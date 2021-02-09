<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Auth;

class LoginMutation extends Mutation {

    protected $attributes = [
        'name' => 'Login'
    ];

    public function args(): array {
        return [
            'email' => ['type' => Type::string()],
            'password' => ['type' => Type::string()]
        ];
    }

    public function type(): Type {
        return Type::string();
    }

    public function resolve($root, $args) {
       $credentials = [
           'email' => $args['email'],
           'password' => $args['password'],
       ];

       if(Auth::guard('web')->attempt($credentials)) {
           return Auth::guard('web')->user()->api_token;
       }
       return null;
    }
}
