<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\OrderFlutter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderFlutterController extends BaseController
{
    public function store(Request $request)
    {
        $responseArray = json_decode($request->getContent()); // set true here
        foreach ($responseArray->foodLists as $row) {

            /*$validator = Validator::make($row, [
                'orderNo' => 'required',
                'foodName' => 'required',
                'quantity' => 'required',
                'bill' => 'required',
                'tables_id' => 'required',
            ]);



            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }*/

            $order = OrderFlutter::create([
                'orderNo'      =>  $row->orderNo,
                'foodName'            =>  $row->foodName,
                'quantity'       =>  $row->quantity,
                'bill'           =>  $row->bill,
                'tables_id'      =>  $row->tableNo
            ]);
        }



       /* $input = $request->all();




        foreach($request->all as $order)
        {
            $order = OrderFlutter::create([
                'orderNo'      =>  $order->orderNo,
                'foodName'            =>  $order->foodName,
                'quantity'       =>  $order->quantity,
                'bill'           =>  $order->bill,
                'tables_id'      =>  $order->tables_id
            ]);
        }*/




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
}
