<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero=Hero::find(1);
        return view('admin.hero.index',compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'title'=>['required','max:255'],
                'sub_title'=>['required','max:500'],
                'bg_image'=>['max:3000','image'],


        ]);
        $hero=Hero::first();

        if($request->hasFile('bg_image'))
        {
            if($hero && File::exists(public_path($hero->bg_image)))
            {
                File::delete(public_path($hero->bg_image));
            }
            $image=$request->file('bg_image');
            $imageName=rand().$image->getClientOriginalName();

            $image->move(public_path('/uploads/hero'),$imageName);
            $imagePath="/uploads/hero/".$imageName;
        // dd($imagePath);
        }
        // dd($request->all());
        Hero::updateOrCreate(
            ['id'=>$id],
            [
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'btn_text'=>$request->btn_text,
                'btn_url'=>$request->btn_url,
                'bg_image'=>isset($imagePath) ? $imagePath : $hero->bg_image,

            ]
        );
        // dd('success');
        toastr()->success('Hero Update Successfully','Congrats!');
        return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
