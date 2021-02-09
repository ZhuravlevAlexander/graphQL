<?php

namespace App\GraphQL\Types;

use App\Task;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TaskType extends GraphQLType {

    protected $attributes = [
        'name' => 'Task',
        'description' => 'A task',
        'model' => Task::class,
    ];

    public function fields(): array {
        return [
            'id' =>[
                'type' => Type::nonNull(Type::int()),
                'description' => 'The project\`s ID',
            ],
            'title' =>[
                'type' => Type::nonNull(Type::string())
            ],
            'description' =>[
                'type' => Type::nonNull(Type::string())
            ],
            'statusCode' =>[
                'type' => Type::string(Type::string())
            ],
            'project' =>[
                'type' => Type::nonNull(GraphQL::type('project'))
            ],
            'user' =>[
                'type' => Type::nonNull(GraphQL::type('user'))
            ],
        ];
    }

    protected function resolveStatusCodeField($root, $args) {
        return $root->statusCode;
    }
}
