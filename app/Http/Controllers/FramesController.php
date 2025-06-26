<?php

namespace App\Http\Controllers;
use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FramesController extends Controller
{
    public function index()
    {
        //disply list of frames:
        $frames = Frame ::all(); // Fetch all frames
        return view('admin.frames.framelist',['frames'=>$frames]); // Pass frames to the view
    }

    public function create(){
        return view('admin.frames.frameadd');
    }

    public function store(Request $request)
    {
        $frames = new Frame();
        $frames ->frame_type = $request -> frame_type;
        $frames ->frame_material = $request -> frame_material;
        $frames ->frame_shape = $request -> frame_shape;
        $frames ->temple_colour = $request -> temple_colour;
        $frames ->model_no = $request -> model_no;
        $frames -> save();

        return redirect("admin/dashboard")->with('success', 'Frame Inserted Successfully.');
        //return response()->json(['success' => 'Frame added successfully!']);
    }

    public function show(string $id){
        //
    }

    public function edit(string $frame_id){
         $frames = DB::table('frame')->where('frame_id', $frame_id)->first();

         return view('admin.frames.frameedit', ['frame'=>$frames]);
    }

    public function update(Request $request,string $frame_id)
    {
        $frames = DB::table("frame")->where("frame_id",$frame_id)->update([
            'frame_type' => $request -> frame_type,
            'frame_material' => $request -> frame_material,
            'frame_shape' => $request -> frame_shape,
            'temple_colour' => $request -> temple_colour,
            'model_no' => $request -> model_no,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Frame Updated Successfully.');
         return response()->json(['success' => 'Frame updated successfully!']);
    }

    public function destroy(string $frame_id)
    {
        DB::table("frame")->where("frame_id",$frame_id)->delete();
        return redirect("admin/dashboard")->with('danger', 'Frame Deleted Successfully.');
    }
}
