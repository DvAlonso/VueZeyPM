<?php

namespace App\Http\Resources;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Company $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_for_logo' => $this->nameForLogo(),
            'description' => $this->description,
            'color' => $this->getColor(),
        ];
    }
}
