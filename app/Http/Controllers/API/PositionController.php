<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use Validator;

class PositionController extends Controller
{
    public $successStatus = 200;

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|unique:position,user_id',
            'position' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()], 401);
        }
        $position = new Position();
        $position->insertPosition($request);
        return response()->json(['success' => 'insert is successful'], $this->successStatus);
    }

    public function delete($user_id)
    {
        $position = new Position();
        $position->deletePosition($user_id);
        return response()->json(['success' => 'delete is successful'], $this->successStatus);
    }

    public function edit($user_id)
    {
        $position = new Position();
        $data = $position->getPositionById($user_id);
        return response()->json($data, $this->successStatus);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()], 401);
        }

        $position = new Position();
        $position->updatePosition($request);
        return response()->json(['success' => 'update is successful'], $this->successStatus);
    }
}
