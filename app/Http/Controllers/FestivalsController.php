<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Http\Resources\Festival as FestivalResource;

class FestivalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return FestivalResource::collection(Festival::all());
    }

    /**
     * get the number of Festivals 
     */
    public function count()
    {
        return response()->json(
            ['festivals_count' => Festival::all()->count()]
        );
    }


    public function getOneById(Festival $festival)
    {
        return new FestivalResource(Festival::findOrFail($festival->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $festival = $request->isMethod('put') ? Festival::findOrFail($request->id) : new Festival;
        $festival->name = $request->input('name');
        $festival->date = $request->input('date');

        if ($festival->save()) {
            return response()->json($festival, 201);
        }
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
    public function show(Festival $festival)
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
    public function update(Request $request, Festival $festival)
    {
        $festival->update($request->all());

        return response()->json($festival, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Festival $festival)
    {
       // Get festival
        $festival = Festival::findOrFail($festival->id);

        if ($festival->delete()) {
            return response()->json(["deleted successfully"], 204);
        }
    }
}
