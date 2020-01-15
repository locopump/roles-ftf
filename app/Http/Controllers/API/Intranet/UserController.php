<?php

namespace App\Http\Controllers\API\Intranet;

use App\Http\Controllers\Controller;
use App\Models\Services\Publico\User\UserService;
use Illuminate\Http\Request;
use Validator;


class UserController extends Controller
{

    protected $userService;

    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }

    public function getUser(Request $request)
    {
        $getUser = (
        $request->route('id')?
            $this->userService->getUser($request->route('id')) :
            $this->userService->getAllUser()
        );

        return $getUser;
    }

    public function addUser(Request $request)
    {
        $user = 0;

        if ($request->isMethod('post')) {
            $data = array(
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'usergroup' => $request->get('usergroup'),
                'enabled' => $request->get('enabled'),
                'activated' => $request->get('activated'),
                'lastvisit' => $request->get('lastvisit'),
            );
            $user = $this->userService->addUser($data);
        }

        return $user;
    }

    public function updateUser(Request $request)
    {
        $id = (int) $request->get('id');
        $data = [];
        $user = [];

        if ($request->isMethod('post')) {
            $request->get('name') ? $data['name'] = $request->get('name') : '';
            dd($id);
            $user = $this->userService->updateUser($data, $id);
//            dd($user);
        }

        return $user;

    }

}
