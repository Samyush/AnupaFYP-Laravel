<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Order;
use Validator;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'status' => 'required',
            'grand_total' => 'required',
            'item_count' => 'required',
            'tables_id' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        foreach($request->orderList as $order)
   {
       $order = Order::create([
           'name'      =>  'ORD-'.strtoupper(uniqid()),
           'status'            =>  'pending',
           'grand_total'       =>  $order['total'],
           'tables_id'           =>  $order['tables_id'],
           'details'      =>  $order['details'],
           'notes'             =>  $order['notes']
       ]);
   }




       /* if ($order) {

            $items = \request()->get('cart');

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('id', $item['id'])->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item['quantity'],
                    'price'         =>  $item['quantity'] * $item['price']
                ]);

                $order->items()->save($orderItem);
            }
        }

        return $order;*/

        return $this->sendResponse($order->toArray(), 'Order taken successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
