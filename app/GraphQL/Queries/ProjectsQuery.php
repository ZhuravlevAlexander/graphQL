<?php

namespace App\GraphQL\Queries;

use App\Models\Project;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query as Query;

class ProjectsQuery extends Query {

    protected $attributes = [
        'name' => 'The project query',
        'description' => 'Retrieves projects',
    ];

    public function args(): array {
        return [
            'projectId' => ['type' => Type::int()]
        ];
    }

    public function type(): Type {
        return Type::listOf(GraphQL::type('project'));
    }

    public function resolve($root, $args) {
        if(isset($args['projectId'])){
            return Project::where('id', $args['projectId'])->get();
        }
        return Project::all();
    }
}
