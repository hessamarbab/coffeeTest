<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderResourceCollection;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin',Order::class);
        $orders=Order::with([
            'user',
            'product',
            'product.option',
            'choice',
            'user'
            ])->paginate(30);
        return view('order.index')->withOrders($orders)->withStatuses(Order::statuses);
    }
    /**
     * Show user's order
     *
     *  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function showList(Request $request)
    {
        return new OrderResourceCollection(
            Auth::user()->orders()
            ->with([
                'user',
                'product',
                'product.option',
                'choice'
                ])->get()
        );
    }
    public function changeStatus(Request $request, Order $order)
    {
        $this->authorize('admin',Order::class);
        $order->changeStatus($request->status);
        return redirect("api/orders");
    }
    /**
     * Store a newly created resource in storage.
     *
     *     Json Api Example:
     *                  [
     *                  "product_id":4,
     *                  "choice_id":9,
     *                  "number":2
     *                  ]
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $data=$request->only('product_id','choice_id','number');
        $order=new Order($data);
        $order->forceFill(['user_id'=>$request->user()->id]);
        $order->checkChoice();
        $order->save();
        return $order;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        Gate::authorize('update-destroy-order', $order);
        $data=$request->only('product_id','choice_id','number');
        $order->fill($data);
        $order->checkChoice();
        $order->save();
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Gate::authorize('update-destroy-order', $order);
        $order->delete();
        $order->save();
        return $order;
    }
}
