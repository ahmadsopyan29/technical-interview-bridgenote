<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Position;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $user = new User();
        $users = $user->getAllUser();
        return response()->json(['response' => 'success', 'data' => $users], $this->successStatus);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return response()->json(['success' => 'registration is successful'], $this->successStatus);
    }

    public function edit($id)
    {
        $user = new User();
        $data = $user->getUserById($id);
        return response()->json($data, $this->successStatus);
    }

    public function update(Request $request)
    {
        if (!User::where('id', $request->id)->where('email', $request->email)->exists()) {
            $validator1 = Validator::make($request->all(), [
                'email' => 'unique:users,email',
            ]);

            if ($validator1->fails()) {
                return response()->json(['messages' => $validator1->messages()], 401);
            }
        }

        if ($request->password) {
            $validator2 = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);

            if ($validator2->fails()) {
                return response()->json(['messages' => $validator2->messages()], 401);
            }

            $user = new User();
            $user->updateWithPassword($request);
        } else {
            $validator3 = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email'
            ]);

            if ($validator3->fails()) {
                return response()->json(['messages' => $validator3->messages()], 401);
            }

            $user = new User();
            $user->updateWithoutPassword($request);
        }

        return response()->json(['success' => 'update is successful'], $this->successStatus);
    }

    public function delete($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            if (Position::where('user_id', $id)->exists()) {
                $userdetail = Position::find($id);
                $userdetail->delete();
            }

            return response()->json(['success' => 'delete is successful'], $this->successStatus);
        } else {
            return response()->json([
                "error" => "user not found"
            ], 404);
        }
    }
}
