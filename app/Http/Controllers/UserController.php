<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $user = new User();
            $data = $user->getAllUser();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('positionStatus', function ($row) {
                    if ($row->user_id) {
                        if ($row->status == 'active') {
                            $btn = 'btn-success';
                        } else {
                            $btn = 'btn-warning';
                        }
                        $postionStatus = $row->position . "
                        <div class='btn-group' style='float: right;'><button type='button' class='btn btn-primary btn-xs editPosition' data-user_id='" . $row->id . "'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-danger btn-xs deletePosition' data-user_id='" . $row->id . "'><i class='fas fa-trash'></i></button></div><button type='button' class='btn " . $btn . "  btn-xs' style='float: right;'>
                        " . $row->status  . "
                        </button>";
                    } else {
                        $postionStatus = "not found<button type='button' class='btn btn-success btn-xs addPosition' style='float: right;' data-user_id='" . $row->id . "' ><i class='fas fa-plus'></i> add position
                        </button>";
                    }
                    return $postionStatus;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="fas fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['positionStatus', 'action'])
                ->make(true);
        }
        return view('pages.users')->with('title', 'Data User');
    }
}
