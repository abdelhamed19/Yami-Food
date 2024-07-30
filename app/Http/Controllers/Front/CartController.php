<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Cart\CartRepositoryClass;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartRepositoryClass;
    public function __construct(CartRepositoryClass $cartRepositoryClass)
    {
        $this->cartRepositoryClass = $cartRepositoryClass;
    }
    public function create()
    {
        $addToCart = $this->cartRepositoryClass->addToCart();
        return redirect()->back();
    }
    public function index ()
    {
        $items = $this->cartRepositoryClass->cart();
        return view('front.orders.index',compact('items'));
    }
    public function clearCart()
    {
        $this->cartRepositoryClass->deleteAllCart();
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->cartRepositoryClass->deleteFromCart($id);
        return redirect()->back();
    }
}
