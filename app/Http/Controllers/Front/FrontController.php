<?php

namespace App\Http\Controllers\Front;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontController extends Controller
{
    public $items;
    public function __construct(Request $request)
    {
        $this->items=Item::filter($request->query())->where("status",'active')
        ->inRandomOrder()
        ->take(6)
        ->get();
    }
    public function index(Request $request)
    {
        $items=$this->items;
        return view('front.index',compact('items'));
    }
    public function about()
    {
        return view('front.about');
    }
    public function menu(Request $request)
    {
        $categories = Category::all();
        $items=$this->items;
        return view('front.menu',compact('items','categories'));
    }
}
