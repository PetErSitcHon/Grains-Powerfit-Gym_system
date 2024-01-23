<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use DB;

class AboutController extends Controller
{
    public function addAbout()
    { 
        $about = About::get();
        return view('admin.about.edit' , compact('about')); // Pass the variable to the view
    
    }

    

    public function addRecord(Request $request){

        DB::table('abouts')->insert([
            'content' => $request->content,
            'vision' => $request->content,
            'mission' => $request->content,
            
        ]);
        return back()->with('error', 'Record successfully added');
        

    }

    public function displayrecord(){
        $data = DB::table('abouts')->get();
        return view('admin.about.display', ['data' => $data]);
    }

    
    // Delete specific record from the table
    public function deleterecord($id){
        DB::table('student')->where('id', $id)->delete();
        return redirect('display')->with('success', "Record successfully deleted");
    }

    public function getdataforupdate($id){
        $data = DB::table('abouts')->where('id', $id)->get();
        return view('admin.about.update', ['data' => $data]);
    }

    // Update the record using the Update Form
    public function updaterecord(Request $request,  $id){
        $items=About::find($id);
        $items->content = $request->input('content');
        $items->update();
        return redirect('update/'. $id)->with('success', 'Record successfully updated', 'id', $id); 
    }

    public function updaterecord2(Request $request,  $id){
        $items=About::find($id);
        $items->content2 = $request->input('content2');
        $items->update();
        return redirect('update/'. $id)->with('success', 'Record successfully updated', 'id', $id); 
    }
 // VISION UPDATE FUNCTION
    public function updaterecord3(Request $request,  $id){
        $items=About::find($id);
        $items->vision = $request->input('vision');
        $items->update();
        return redirect('update/'. $id)->with('success', 'Record successfully updated', 'id', $id); 
    }

    // MISSION UPDATE FUNCTION
    public function updaterecord4(Request $request,  $id){
        $items=About::find($id);
        $items->mission = $request->input('mission');
        $items->update();
        return redirect('update/'. $id)->with('success', 'Record successfully updated', 'id', $id); 
    }
    
}








