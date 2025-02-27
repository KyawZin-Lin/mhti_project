<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Room;
use App\Models\Admins\Batch;
use App\Models\Admins\Floor;
use Illuminate\Http\Request;
use App\Models\Admins\Student;
use App\Models\Admins\Building;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:room-list|room-create|room-edit|room-delete', ['only' => ['index','store']]);
          $this->middleware('permission:room-create', ['only' => ['create','store']]);
          $this->middleware('permission:room-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:room-delete', ['only' => ['destroy']]);
     }

    public function index(Request $request)
    {
        if($request->search){
            $rooms = Room::where('name','LIKE',$request->search.'%')
                            ->latest('id')->paginate(10);
        }else{
            $rooms = Room::latest('id')->paginate(10);
        }

        return view('admins.room_structures.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $floors = Floor::get();
        $buildings = Building::get();
        return view('admins.room_structures.rooms.create',compact('floors','buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room;
        $room->name = $request->name;
        $room->floor_id = $request->floor_id;
        $room->building_id = $request->building_id;
        $room->save();
        return redirect()->route('admin.rooms.index')->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,Request $request)
    {

        $room_batch = Batch::where('room_id','LIKE',$id)->first();

        if($request->search){
            $search = $request->search;
            $batches = Batch::where('batch','LIKE',$search.'%')
                                ->where('room_id','LIKE',$id)
                                ->latest('id')
                                ->paginate(10);
        }else{
        $batches = Batch::where('room_id','LIKE',$id)
                            ->latest('id')
                            ->paginate(10);
    }

        $students = Student::get();

        $countings = DB::table('students')
            ->join('batches', 'students.batch_id', '=', 'batches.id')
            ->select(DB::raw('count(*) as count'), 'students.batch_id as batch_id')
            ->groupBy('batch_id')
            ->get();

        $studentBatches = Student::select('batch_id')->get();

        foreach($studentBatches as $student)
        {
            $batchQty[] = $student->batch_id;
        }

        $count = Batch::whereIn('id',$batchQty)->get();

        return view('admins.room_structures.rooms.detail',compact('room_batch','batches','students','batchQty','countings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $floors = Floor::get();
        $buildings = Building::get();
        return view('admins.room_structures.rooms.edit',compact('room','floors','buildings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $room->name = $request->name;
        $room->floor_id = $request->floor_id;
        $room->building_id = $request->building_id;
        $room->save();
        return redirect()->route('admin.rooms.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::where('id',$id)->delete();
        return back()->with('success','Deleted Successfully.');
    }
}
