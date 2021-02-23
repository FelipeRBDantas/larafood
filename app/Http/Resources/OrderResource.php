<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Http\Resources\TableResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\TenantResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\EvaluationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'identify' => $this->identify,
            'total' => $this->total,
            'status' => $this->status,
            'date' => Carbon::make($this->created_at)->format('Y-m-d'),
            'company' => new TenantResource($this->tenant),
            'client' => $this->client ? new ClientResource($this->client) : '',
            'table' => $this->table ? new TableResource($this->table) : '' ,
            'products' => ProductResource::collection($this->products),
            'evaluations' => new EvaluationResource($this->evaluations),
        ];
    }
}
