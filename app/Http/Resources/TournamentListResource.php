<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'disciplineName' => [
                'id' => $this->discipline->id,
                'name' => $this->discipline->name,
            ],
            'prizeMoney' => $this->prizeMoney,
            'contribution' => $this->contribution,
            'date' => $this->date,
            'ageLimit' => $this->ageLimit,
        ];
    }
}
