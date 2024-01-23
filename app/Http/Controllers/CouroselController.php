<?php

namespace App\Http\Controllers;

use App\Models\Courosel;
use Illuminate\Http\Request;
use DB;

class CouroselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courosels = Courosel::latest()->paginate(5);
    return view('admin.courosel.display',compact('courosels'))
    ->with('i', (request()->input('page', 1) - 1) * 5);// Pass the variable to the view
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courosel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Courosel::create($input);
      
        return redirect()->route('courosel.view')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courosel  $courosel
     * @return \Illuminate\Http\Response
     */
    public function show(Courosel $courosel)
    {
        $data = DB::table('courosels')->get();
        return view('admin.courosel.display', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courosel  $courosel
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {  
    //     $data = DB::table('courosels')->where('id', $id)->get();
    //     return view('admin.courosel.edit',['data' => $data]);
    // }

    public function edit(Courosel $courosels)
    {
        return view('admin.courosel.edit',compact('courosels'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courosel  $courosel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {  $items=Courosel::find($id);
        $request->validate([
            'title' => 'required',
            'details' => 'required'
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
           
        $items->update($input);
     
        return redirect()->route('courosel.view')
                        ->with('success','Product updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courosel  $courosel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $items=Courosel::find($id);
        $items->delete();
      
        return redirect()->route('courosel.view')
                        ->with('success','Product deleted successfully');
    }
}
