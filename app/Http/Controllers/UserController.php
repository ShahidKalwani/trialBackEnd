<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function __construct() {
    }
    public function index() {

        $user  = User::all();

        return response([
            'users'=> $user
        ], 200);

    }

    public function addUser(Request $request) {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()) {

            $user->roles()->attach($request->role_id);

            return response(
                [
                    'message'=> "User Added Successfully"
                ], 201);
        }
    }


    public function editUser(Request $request) {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            return response([
                'message' => "User Updated Successfully"
            ],201);
        }

    }

    public  function delete(Request $request) {
        if(User::destroy($request->id)) {
            return response(
                [
                    'message' => "User has been deleted successfully"
                ],201);
        }
    }

    public function getUsers(Request $request) {
        $user = $request->user();
        if( $user->can('all') ||  $user->can('view-user')) {
            $user = User::all();
            return response([
                'users'=> $user
            ], 201);
        }
        return response([
            'message' => 'You are not authorized'
        ], 401);
    }

    public  function permissions(Request $request) {

        $user = $request->user();
//        if($user->hasRole('admin')) {
            $data =  $user->roles()->get()[0];
            $role =Role::find( $data->pivot->role_id);
            $role_permissions=  $role->permissions()->get();
            $nav_items = $this->navItems($role_permissions);

            return response([
                "role" => $data->pivot->role_id,
                "permissions" => $role_permissions,
                'nav_items' => $nav_items
            ], 201);
//        }
    }

    public function navItems($permissions) {

        $nav_items = [];
        $nav_items[] = [
            'name' => 'Dashboard',
            'route' => 'dashboard',
        ];
        foreach ($permissions as $permission) {
            if($permission->slug === 'all') {
               $nav_items =
                    [
                   [
                       'name' => 'Dashboard',
                       'route' => 'dashboard',
                   ],
                    [
                        'name' => 'User',
                        'route' => 'users',
                        'permissions' => 'all'
                    ],
                    [
                        'name' => 'Post',
                        'route' => 'posts',
                        'permissions' => 'all'
                    ]
                ];
            } else {

                if ($permission->module === 'User') {
                    if ($this->getKey($nav_items, "name", "User") === false) {
                        $nav_items[] = [
                            'name' => 'User',
                            'route' => 'users',
                            'permissions' => [$permission->slug]
                        ];
                    } else {
                        $key = $this->getKey($nav_items, "name", "User");
                        $nav_items[$key]->permissions =$permission->slug;
                    }
                }

                if ($permission->module === 'Post' ) {
                    if ($this->getKey($nav_items, "name", "Post") === false) {
                        $nav_items[] = [
                            'name' => 'Post',
                            'route' => 'posts',
                            'permissions' => [$permission->slug]
                        ];
                    } else {
                        $key = $this->getKey($nav_items, "name", "Post");
//                        return $nav_items[$key]["permissions"];
//                        $index =  count($nav_items[$key]->permissions);
                        $nav_items[$key]["permissions"][] =$permission->slug;
                    }
                }

            }


        }

        return $nav_items;
    }

    function getKey($array, $key, $val) {
        foreach ($array as $index => $item)
            if (isset($item[$key]) && $item[$key] == $val)
                return $index;
        return false;
    }

    public function updateRole(Request $request) {
        $user=  $request->user();
        //remove previous role
        $prev_role_id  = $user->roles()->get()[0]->pivot->role_id;
        $user->roles()->detach($prev_role_id);
        $user->roles()->attach($request->role_id);

        return response([
            'message' => "Updated Roles Successfully",
        ], 201);
    }

}
