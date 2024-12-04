<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'order_id' => $this->order_id,
            'amount' => priceFormat($this->amount),
            'status' => $this->status->alias(),
            'type' => $this->type->alias(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
