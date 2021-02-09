<?php

namespace App\GraphQL\Types;

use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType {

    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => User::class,
    ];

    public function fields(): array {
        return [
            'id' =>[
                'type' => Type::nonNull(Type::int()),
                'description' => 'The project\`s ID',
            ],
            'email' =>[
                'type' => Type::nonNull(Type::string())
            ],
            'name' =>[
                'type' => Type::nonNull(Type::string())
            ],
            'api_token' =>[
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }

}
