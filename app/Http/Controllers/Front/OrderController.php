<?php

namespace App\Http\Controllers\Front;

use App\Models\Item;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $items = OrderItems::all();
        $totalPrice = 0;
        foreach ($items as $item)
        {
            $totalPrice = $item->sum('price');
        }
        return view('front.orders.index',compact('items','totalPrice'));
    }
    public function addItem(Request $request)
    {
        $request->validate([
            'item_id'=> 'required|exists:items,id',
        ]);
        DB::beginTransaction();
        try{
             $item = Item::where('id',$request->item_id)->first();

             $items = OrderItems::create([
                'user_id' => Auth::id(),
                'item_id' => $request->item_id,
                'price' => $item->price,
                'options' => $request->options,
                'item_name' => $item->name,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Item added to cart');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function editQuantity ($uuid, Request $request)
    {
        $item = OrderItems::where('uuid',$uuid)->first();
        $item->update([
            'quantity' =>$request->quantity,
        ]);
        return redirect()->back();
    }
    public function deleteItem ($id)
    {
        $item = OrderItems::findOrFail($id)->delete();
        return redirect()->back()->with("success", "Item deleted successfully.");
    }

}
