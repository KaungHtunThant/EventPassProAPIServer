<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            if(!$user){
                $user = User::find(1)->first();
            }
            $user->Logs()->createMany($items = [
                [
                    'user_id' => $user->id,
                    'descriptions' => 'User.Login',
                    'http_code' => '401',
                    'action_status' => 'Fail',
                    'bookmark' => 0,
                    'remark' => '',
                ]
            ]);

            return response('Login credentials not vaild.', 401);
        }

        $token = [
            'token' => $user->createToken($user->name)->plainTextToken
        ];

        // $user = Auth::user();  //If user is not defined

        $user->Logs()->createMany($items = [
            [
                'user_id' => $user->id,
                'descriptions' => 'User.Login',
                'http_code' => '200',
                'action_status' => 'Success',
                'bookmark' => 0,
                'remark' => '',
            ]
        ]);

        return response($token, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|unique:user,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = Auth::user();
 
        if ($validator->fails()) {
            $user->Logs()->createMany($items = [
                [
                    'user_id' => $user->id,
                    'descriptions' => 'User.Create',
                    'http_code' => '422',
                    'action_status' => 'Fail',
                    'bookmark' => 0,
                    'remark' => '',
                ]
            ]);

            return response('Unprocessable content.', 422);
        }

        $fields = $validator->validated();

        User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $user->Logs()->createMany($items = [
            [
                'user_id' => $user->id,
                'descriptions' => 'User.Create',
                'http_code' => '201',
                'action_status' => 'Success',
                'bookmark' => 0,
                'remark' => '',
            ]
        ]);

        return response('User created', 201);
    }

    public function index(Request $request){

        (!isset($request->paginate)) ? $request->paginate = 10 : false;
        (!isset($request->orderBy)) ? $request->orderBy = 'name' : false;
        (!isset($request->page)) ? $request->page = '1' : false;

        $users = User::orderBy($request->orderBy)
                ->when(request('searchValue', false), function($query, $searchValue){
                    return $query->where('name', 'LIKE', '%'.$searchValue.'%')
                                ->orwhere('email', 'LIKE', '%'.$searchValue.'%');
                })
                ->paginate($request->paginate);

        $users->appends([
            'orderBy' => $request->orderBy,
            'searchValue' => $request->searchValue,
            'paginate' => $request->paginate
        ]);

        $user = Auth::user();

        $user->Logs()->createMany($items = [
                [
                    'user_id' => $user->id,
                    'descriptions' => 'User.Read.All',
                    'http_code' => '200',
                    'action_status' => 'Success',
                    'bookmark' => 0,
                    'remark' => '',
                ]
            ]);

        return response($users, 200);
    }
}
