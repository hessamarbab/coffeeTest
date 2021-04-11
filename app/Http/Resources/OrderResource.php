<?php

namespace App\Http\Resources;

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
        return [
           'id'=>$this->id,
           'product_name'=>$this->product->name,
           'option_name'=>$this->product->option->name,
           'choice'=>$this->choice->name,
           'cost'=>$this->product->cost."$",
           'number'=>$this->number,
           'status'=>$this->status
        ];
    }
}
