<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Image;
use App\Models\Rating;
use App\Models\School;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.index');
    }

    public function list_school()
    {
        //
        $schools = School::all();
        return view('admin.list_school',[
            'schools' => $schools
        ]);
    }


    public function save_school(Request $request)
    {
        //
        //error_log($requestuest->method());
        if ($request->method() == 'POST') {
            

            $school = School::create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'information' => $request->input('information'),
                'phone_number' => $request->input('phone_number'),
            ]);
            $ratings = Rating::all();
            
            
            foreach ($ratings as $rating) {
                $school->ratings()->attach($rating->id);
                # code...
            }
            $school->save();

            foreach ($request->file('photo') as $index => $file) {
                // do uploading like what you are doing in your single file.
                $image = new Image();
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                //$fileModel->name = time().'_'.$request->file->getClientOriginalName();
                $image->path = '/storage/' . $filePath;
                $image->school_id = $school->id;
                $image->save();
                

            }


            //ddd('hello');
            return view('admin.save_school',[ 'message' => 'school create successfully']);
        }
        return view('admin.save_school');
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
    public function store(requestuest $requestuest)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(requestuest $requestuest, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
