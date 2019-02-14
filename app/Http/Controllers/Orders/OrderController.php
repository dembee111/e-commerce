<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Models\user;
use Illuminate\Http\Request;

class OrderController extends Controller
{

	public function __construct()
	{
		$this->middleware(['auth:api']);
	}

    public function store(OrderStoreRequest $request)
    {
    	$request->user()->orders()->create(
            $request->only(['address_id', 'shipping_method_id'])
    	);
    }
}
