<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Concert extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'heure' => $this->heure,
            'festival_id'=>$this->festival->id,
            'tickets'=>$this->tickets->count()
        ];
    }
}
