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
        $data = [];
        $user = [];

        if ($request->isMethod('post')) {
            $id = (int) $request->get('id');
            if ($request->get('name')) $data['name'] = $request->get('name');
            if ($request->get('username')) $data['username'] = $request->get('username');
            if ($request->get('email')) $data['email'] = $request->get('email');
            if ($request->get('usergroup')) $data['usergroup'] = $request->get('usergroup');
            if ($request->get('enabled')) $data['enabled'] = $request->get('enabled');
            if ($request->get('activated')) $data['activated'] = $request->get('activated');
            if ($request->get('lastvisit')) $data['lastvisit'] = $request->get('lastvisit');
            $user = $this->userService->updateUser($data, $id);
        }

        return $user;

    }

    public function deleteUser(Request $request)
    {
        $user = [];

        if ($request->isMethod('post')) {
            $id = (int) $request->get('id');
            $user = $this->userService->deleteUser($id);
        }

        return $user;

    }

}
