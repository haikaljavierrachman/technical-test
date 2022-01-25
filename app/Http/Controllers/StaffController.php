<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.index');
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'nohp' => 'required',
            'email' => 'required|unique:staff|email:dns',
            'salary' => 'required',
            'foto' => 'image|file|max:1024'
        ]);

        if ($request->file('foto')) {
            $validatedData["foto"] = $request->file('foto')->store('images');
        }

        Staff::create($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staff.show', [
            'staff' => $staff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', [
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'nohp' => 'required',
            'email' => 'required|email:dns',
            'salary' => 'required',
            'foto' => 'image|file|max:1024'
        ]);

        if ($request->file('foto')) {
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $validatedData["foto"] = $request->file('foto')->store('images');
        }

        Staff::where('id', $staff->id)
            ->update($validatedData);

        return redirect('/staff' . '/' . $staff->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        if ($staff->foto) {
            Storage::delete($staff->foto);
        }

        Staff::destroy($staff->id);
        return redirect('/');
    }
}
