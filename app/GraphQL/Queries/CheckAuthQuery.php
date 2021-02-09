<?php

namespace App\GraphQL\Queries;

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query as Query;

class CheckAuthQuery extends Query {

    protected $attributes = [
        'name' => 'UserAuthQuery',
        'description' => 'Checks the user auth',
    ];

    public function args(): array {
        return [
            'projectId' => ['type' => Type::int()]
        ];
    }

    public function type(): Type {
        return Type::string();
    }

    public function resolve($root, $args) {
        return '';
    }
}
