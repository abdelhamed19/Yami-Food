<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Item;
use App\Models\Category;

use App\Helpers\UploadImage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\dashboard\StoreItem;
use App\Http\Requests\dashboard\UpdateItem;

class ItemsController extends Controller
{
    public $categories;
    public $uploadImageObj;
    public function __construct(UploadImage $uploadImage){
        $this->categories=Category::all();
        $this->uploadImageObj=$uploadImage;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Item::with('category')->latest()->paginate(7);
        return view('dashboard.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=$this->categories;
        return view('dashboard.items.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItem $request)
    {
        $data = $request->except("img");
        $data['image']=$this->uploadImageObj->upload("items",$request);
        Item::create($data);
        return redirect()->route("dashboard.items.index")->with("success", "Item Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('dashboard.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories=$this->categories;
        return view('dashboard.items.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItem $request, Item $item)
    {
        $old_image = $item->image;
        $data=$request->except("img");
        $new_image_path = $this->uploadImageObj->upload("items",$request);
        if ($new_image_path) {
            $data["image"] = $new_image_path;
        }

        $item->update($data);

        if ($old_image && $new_image_path)
        {
            Storage::disk("public")->delete($old_image);
        }

        return redirect()->route("dashboard.items.index")->with("success", "Item Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('dashboard.items.index');
    }
    public function trashed()
    {
        $items=Item::onlyTrashed()->latest()->paginate(7);
        return view("dashboard.items.trashed",compact("items"));
    }
    public function restore ($id)
    {
        $item=Item::with('category')->onlyTrashed()->find($id);
        $item->restore();
        return back()->with("success", "Item Restored Successfully");
    }
    public function forceDelete($id)
    {
        $item=Item::with('category')->onlyTrashed()->find($id);
        if ($item->image) {
            Storage::disk("public")->delete($item->image);
        }
        $item->forceDelete();
        return back()->with("success", "Item Deleted Successfully");
    }
}
