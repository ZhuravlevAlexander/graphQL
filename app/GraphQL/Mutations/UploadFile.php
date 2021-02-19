<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Error\Error;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadFile
{
    /**
     * Upload image to user avatar
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $file = $args['file'];
        $user = User::find($args['id']);
        $path = Storage::putFileAs('public/users/'. md5($args['id']. "_". $user->getAttributes()['email']), new File($file->getPathname()), 'avatar.jpg');

        $user->avatar = $path;
        $status = $user->save();

        $file->storePublicly('uploads');

        return [
            'path' => $path,
            'status' => $status,
            'message' => 'File uploaded'
        ];
    }
}
