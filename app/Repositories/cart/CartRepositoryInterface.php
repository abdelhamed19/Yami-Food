<?php
namespace App\Repositories\Cart;

use Illuminate\Http\Request;

interface CartRepositoryInterface
{
    public function addToCart();
    public function cart();
    public function deleteAllCart();
    public function deleteFromCart($id);
}
