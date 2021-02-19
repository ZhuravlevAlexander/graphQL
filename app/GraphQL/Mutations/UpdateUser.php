<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateUser
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::find($args['id']);

        if(Auth::guard()->user()) {
            if (isset($args['name'])) {
                $user->name = $args['name'];
            }
            if (isset($args['email'])) {
                $user->email = $args['email'];
            }
            $status = $user->save();
            return [
                'status' => $status,
                'message' => 'User data was updated'
            ];
        }
        return [
            'status' => "fail",
            'message' => "You have no permissions"
        ];
    }
//    public function update(User $user): bool
//    {
////        dd(Auth::guard()->user());
////        return Auth::guard()->user();
////        dd($user);
//        return $user->is_admin;
//    }
}
