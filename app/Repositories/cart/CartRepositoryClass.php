<?php
namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CartRepositoryClass implements CartRepositoryInterface
{
    public function addToCart()
    {
        $item = Item::where('id',request('item_id'))->first();
        $cartItem = Cart::create([
            'item_id'=>$item->id,
            'quantity'=>1,
            'price'=>$item->price,
            'item_name'=>$item->name
        ]);
        return $cartItem;
    }
    public function cart()
    {
        return App::make('cart_items');
    }
    public function deleteAllCart()
    {
        Cart::query()->delete();
    }
    public function deleteFromCart($id)
    {
       return Cart::where('item_id',$id)->delete();
    }
}
