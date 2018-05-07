<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Ticket;
use App\Http\Resources\Ticket as TicketResource;
use App\Http\Resources\Concert as ConcertResource;


class TicketsController extends Controller
{
    /**
     * get All the Tickets
     */
    public function getAll()
    {
        return TicketResource::collection(Ticket::all());
    }

    /**
     * get the number of Tickets 
     */
    public function count()
    {
        return response()->json(
            ['tickets_count' => Ticket::all()->count()]
        );
    }

    /**
     * get single Ticket Concert
     */

    public function getConcert(Ticket $ticket)
    {
        return new ConcertResource(Ticket::findOrFail($ticket->id)->concert);
    }

    /**
     * get single Ticket
     */
    public function getOneById(Ticket $ticket)
    {
        return new TicketResource(Ticket::findOrFail($ticket->id));
    }

    public function checkBarcode($barcode)
    {

        if (gettype(Ticket::where('barcode', $barcode)->First()) === 'object') {
            return response()->json(1, 201);
        } else {
            return response()->json(0, 201);
        }
    }

    public function create(Request $request)
    {
        $ticket = $request->isMethod('put') ? Ticket::findOrFail($request->id) : new Ticket;
        $ticket->barcode = $request->input('barcode');

        if ($ticket->save()) {
            return response()->json($ticket, 201);
        }
    }


    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return response()->json($ticket, 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function delete(Ticket $ticket)
    {
        // Get article
        $ticket = Ticket::findOrFail($ticket->id);

        if ($ticket->delete()) {
            return response()->json(["deleted successfully"], 204);
        }
    }

}
