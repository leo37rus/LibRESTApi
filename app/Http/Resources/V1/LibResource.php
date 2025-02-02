<?php

namespace App\Http\Resources\V1;

use App\Models\Lib;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Lib $resource */
        $resource = $this->resource;

        return [
            'id'=> $resource->id,
            'name' => $resource->name,
            'author' => $resource->author,
            'year' => $resource->year,
        ];
    }
}
