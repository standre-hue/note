<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\School;
use App\Models\Rating;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        foreach ($schools as $school) {
            $school->average = 0;
            $sum = 0;
            $note_ = 0;
            error_log($school->name);
            error_log($school->ratings->count());
            foreach ($school->ratings as $rating) {
                
                $sum = 0;
                //dd($rating);
                $rating->average = 0;
                foreach ($rating->notes as $note) {
                    # code...
                    $sum = $sum + $note->number;
                    
                }
                $rating->average = count($rating->notes) == 0 ? 0 : $sum / count($rating->notes);
                $sum = $sum + $rating->average;
                # code...
            }
            $school->average = $sum / count($school->ratings);

            # code...
        }
        $arr = $schools->toArray();
        //dd($arr);
        usort($arr, function ($a, $b) {
            //dd($a);
            return $a['average'] - $b['average'];
        });

        //
        return view('home.index', [
            'schools' => $schools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail_school($id)
    {
        $school_ = School::find($id);
        $images = $school_->images;
        $schools = School::all();
        $note_ = 0;
        foreach ($schools as $school) {
            //if ($school->id == $id) {
                //$school_ = $school;
                $school->average = 0;
                $sum = 0;
                foreach ($school->ratings as $rating) {
                    $sum = 0;
                    //dd($rating);
                    $rating->average = 0;
                    foreach ($rating->notes as $note) {
                        # code...
                        $sum = $sum + $note->number;
                        
                    }
                    $rating->average = count($rating->notes) == 0 ? 0 : $sum / count($rating->notes);
                    $sum = $sum + $rating->average;
                    # code...
                }
                $school->average = $sum / count($school->ratings);
            //}
            # code...
        }

        foreach ($school->ratings as $rating) {
                foreach ($rating->notes as $note) {
                        
                        $note_ = $note_ + 1;
                    }
                    
                    # code...
                }
                
            //}
            # code...
        
        
        $arr = $schools->toArray();
        //dd($arr);
        usort($arr, function ($a, $b) {
            //dd($a);
            return $a['average'] - $b['average'];
        });

        foreach ($arr as $key => $school) {
            # code...
            //dd($school);
            if($school['id'] == $id){
                $school['rank'] = $key;
                $school_ = $school;
            }
        }
        $user = Auth::user();
        $is_education_activated = true;
        $is_frame_activated = true;
        if($user != null){
            foreach ($user->note as $note) {
                if($note->rating->name == 'Education')
                $is_education_activated = false;
                if($note->rating->name == 'Cadre Scolaire')
                $is_frame_activated = false;
                # code...
            }
        }
        

        return view('home.detail_school', [
            'images' => $images,
            'school' => $school_,
            'note' => $note_,
            'is_frame_activated' => $is_frame_activated,
            'is_education_activated' => $is_education_activated
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rate(Request $request)
    {
        $rating = Rating::find($request->query('rating_id'));
        $school = School::find($request->query('school_id'));

        if($request->method() == 'POST'){
            $note = Note::create([
                'number' => $request->input('number'),
                'comment' => $request->input('comment'),
                'user_id' => 1,
                'rating_id' => $rating->id,
            ]);
            return redirect('/detail_school/'.$school->id);
        }
        //
        return view('home.rate',[
            'rating' => $rating,
            'school' => $school
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
