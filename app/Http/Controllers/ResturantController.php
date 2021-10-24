<?php

namespace App\Http\Controllers;

use App\Models\resturant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rests=Resturant::all();
        return view('rests.index')->with('rests',$rests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rests.create');
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
            'name'=>'required'
        ]);
        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/rests',$newPhoto);
        $rests=Resturant::create([
            'name'=>$request->name,
            'photo'=>'uploads/rests/'.$newPhoto,
        ]);
        $rests=Resturant::create($request->all());
        return redirect()->route('rests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(resturant $resturant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rests=Resturant::find($id);
        return view('rests.edit', ["rests"=>$rests]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rests=Resturant::find($id);
        if ($request->has('photo')) {
            $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/rests',$newPhoto);
        $rests->photo='uploads/rests'.$newPhoto;

        }
        $rests->name=$request->name;
        flash('تم إضافة المنتج بنجاح')->success();
        $rests->save();
        return redirect()->route('rests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rests=Resturant::find($id);
        $rests->delete();
        return redirect()->back();
    }
}
