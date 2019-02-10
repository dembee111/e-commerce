<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductIndexResource extends JsonResource
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
           'detail' => $this->detail,
           'slug' => $this->slug,
           'price' => $this->formattedPrice,
           'discount' => $this->discount, 
           // 'totalPrice' => round((1-($this->discount/100)) * $this->price, 2),
           'stock_count' => $this->stockCount(),
           'in_stock' => $this->inStock(),         
         ];
    }
}
