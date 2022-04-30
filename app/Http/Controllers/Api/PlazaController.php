<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Plaza;

class PlazaController extends Controller
{
    //

    public function fetch(Request $request)
    {

        // checks if query is for multiple or single plaza
        $data = [];
        
        if ($request->plaza_id == '') {

            $data = Plaza::where('owner_id', $request->user()->id)->get();
        }

        if ($request->plaza_id != '') {

            $whereCondition = [
                ['id', '=', $request->plaza_id],
                ['owner_id', '=', $request->user()->id],
            ];

            $data = Plaza::where($whereCondition)->get();
        }

        if (count($data) == 0) {

            $data = "no records found";
        }

        return response()->json([
            'result' => $data,
        ]);
    }

    public function create(Request $request)
    {

        //code...
        $user_id = $request->user()->id;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'gps_longitude' => 'required|string|min:4',
            'gps_latitude' => 'required|string|min:4',
        ]);

        $plaza = Plaza::create([
            'owner_id' => $user_id,
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'gps_longitude' => $validatedData['gps_longitude'],
            'gps_latitude' => $validatedData['gps_latitude'],
        ]);


        $notification = Notification::create([
            'user_id' => $user_id,
            'title' => "New Plaza Created",
            'message' => 'You just created a new plaza on Tenancymis'
        ]);


        if ($plaza) {
            return response()->json([
                'result' => 'plaza added successfully',
            ]);
        } else {
            return response()->json([
                'result' => 'plaza create operation failed',
            ]);
        }
    }

    public function update(Request $request)
    {
        //code...
        $user_id = $request->user()->id;
        $plaza = Plaza::find($request->id);

        $plaza->name = $request->name;
        $plaza->address = $request->address;
        $plaza->gps_longitude = $request->gps_longitude;
        $plaza->gps_latitude = $request->gps_latitude;

        $result = $plaza->save();

        $notification = Notification::create([
            'user_id' => $user_id,
            'title' => "Plaza Record Updated",
            'message' => 'You just updated a plaza record on Tenancymis'
        ]);

        if ($result) {
            return response()->json([
                'result' => 'data updated successfully',
            ]);
        } else {
            return response()->json([
                'result' => 'update operation failed',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->user()->id;

        $plaza = Plaza::find($request->id);


        $result = $plaza->delete();

        if ($result) {
            return response()->json([
                'result' => 'record deleted successfully',
            ]);
        } else {
            return response()->json([
                'result' => 'delete operation failed',
            ]);
        }

        $notification = Notification::create([
            'user_id' => $id,
            'title' => "Plaza Deleted",
            'message' => 'plaza record deleted on Tenancymis'
        ]);
    }
}
