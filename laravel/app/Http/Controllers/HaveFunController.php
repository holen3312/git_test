<?php

namespace App\Http\Controllers;

use App\Models\Play;
use App\Models\Toys;
use Illuminate\Http\Request;
use App\Http\Resources;

class HaveFunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plays = Play::all();
        foreach ($plays as $newPlay) {
            $test = $newPlay->goTest;
            return $test;
        }
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
        $test = Play::create([
            "title" => $request->title,
            "howLong" => $request->howLong
        ]);
        return $test;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $play =  Play::find($id);
        return response()->json([
            "test" => new Resources\test($play)
        ]);
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
        $test = Toys::find($id);
        $test->title = $request->title;
        $test->save();
        return $test;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Play::find($id);
        $test->delete();
        return response()->json([
            "status" => true
        ]);
    }
}
