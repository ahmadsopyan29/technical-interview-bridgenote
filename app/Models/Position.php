<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = "position";
    protected $primaryKey = "user_id";
    protected $fillable = ['user_id', 'status', 'position'];
    public $timestamps = false;

    public function insertPosition($request)
    {

        $query = Position::create(
            [
                'user_id' => $request->user_id,
                'position' => $request->position,
                'status' => $request->status
            ]
        );

        return $query;
    }

    public function getPositionById($user_id)
    {
        $query = Position::select('user_id', 'position', 'status')->where('user_id', '=', $user_id)->firstOrFail();
        return $query;
    }

    public function updatePosition($request)
    {
        $query = Position::where('user_id', $request->user_id)
            ->update(['position' => $request->position, 'status' => $request->status]);
        return $query;
    }

    public function deletePosition($user_id)
    {

        $query = Position::where('user_id', $user_id)->delete();
        return $query;
    }
}
