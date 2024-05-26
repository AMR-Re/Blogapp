<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::first();
        return view('admin.experience.index', compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000'],
            'phone' => ['nullable', 'max:100'],
            'email' => ['nullable', 'max:100', 'email']
        ]);

        $experience = Experience::find($id);
        $imagePath = handleUpload('image', $experience);

        Experience::updateOrCreate(
            ['id' => $id],
            [
               'image' => (!empty($imagePath) ? $imagePath : $experience->image),
               'title' => $request->title,
               'description' => $request->description,
               'phone' => $request->phone,
               'email' => $request->email
            ]
        );

        toastr('Updated Successfully!', 'success');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
