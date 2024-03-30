<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeceasedResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            ...parent::toArray($request),
            'title_ceo' => $this->title,
            'description_ceo' => $this->texts[0]['text'] ?? '',
            'h1_ceo' => mb_strtoupper($this->title),
        ];
    }
}
