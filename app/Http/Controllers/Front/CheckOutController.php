<?php

namespace App\Http\Controllers\front;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
    public function viewCheckOut()
    {
        $items = OrderItems::all();

        return view('front.orders.checkout',compact('items'));
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
        ]);
        DB::beginTransaction();
        try{
            $order = Order::create([
                'user_id' => auth()->id(),
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
            $items = OrderItems::where('user_id', auth()->id())->get();
            foreach($items as $item){
                $order->items()->create([
                    'item_id' => $item->item_id,
                    'price' => $item->price,
                    'options' => $item->options,
                    'item_name' => $item->item_name,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Order placed successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
