<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concert;


use App\Http\Resources\Concert as ConcertResource;
use App\Http\Resources\Festival as FestivalResource;

class ConcertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return ConcertResource::collection(Concert::all());
    }

    /**
     * get the number of Festivals 
     */

    public function count()
    {
        return response()->json(
            ['concerts_count' => Concert::all()->count()]
        );
    }
    public function getFestival(Concert $concert) 
    {
        return new FestivalResource(Concert::findOrFail($concert->id)->festival);
    }

    public function countTickets(Concert $concert)
    {
        return response()->json(
            ['concert_tickets_count' => Concert::findOrFail($concert->id)->tickets()->count()]
        );
    }


    public function getOneById(Concert $concert)
    {
        return new ConcertResource(Concert::findOrFail($concert->id));
    }

    public function getOneByDate($date)
    {
        $data = Concert::where('date',$date)->First();

        if(gettype($data) =='object'){
            return new ConcertResource($data);
        }else {
            return [];
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $concert = $request->isMethod('put') ? Concert::findOrFail($request->id) : new Concert;
        $concert->name = $request->input('name');
        $concert->date = $request->input('date');
        $concert->heure = $request->input('heure');

        if ($concert->save()) {
            return response()->json($concert, 201);
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
    public function show(Concert $concert)
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
    public function update(Request $request, Concert $concert)
    {
        $concert->update($request->all());

        return response()->json($concert, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Concert $concert)
    {
       // Get festival
        $concert = Concert::findOrFail($concert->id);

        if ($concert->delete()) {
            return response()->json(["deleted successfully"], 204);
        }
    }
}
