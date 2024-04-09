<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Category;
use App\Helpers\UploadImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\dashboard\StoreCategory;
use App\Http\Requests\dashboard\UpdateCategory;

class CategoryController extends Controller
{
    public $uploadImageObj;
    public function __construct(UploadImage $uploadImage){
        $this->uploadImageObj=$uploadImage;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('items')->latest()->paginate(4);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {
        $data = $request->except("img");
        $data['image']=$this->uploadImageObj->upload("category",$request);
        Category::create($data);
        return redirect()->route("dashboard.categories.index")->with("success", "Category Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("dashboard.category.show",compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("dashboard.category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $old_image=$category->image;
        $data=$request->except("img");
        $new_image_path=$this->uploadImageObj->upload("category",$request);
        if ($new_image_path)
        {
            $data["image"]=$new_image_path;
        }
        $category->update($data);

        if ($old_image && $new_image_path)
        {
            Storage::disk("public")->delete($old_image);
        }
        return redirect()->route("dashboard.categories.index")->with("success","Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::disk("public")->delete($category->image);
        }
        $category->delete();
        return redirect()->back()->with("success","Category Updated");
    }
    public function trashed()
    {
        $categories=Category::onlyTrashed()->latest()->paginate(7);
        return view("dashboard.category.trashed",compact("categories"));
    }
    public function restore($id)
    {
        $category=Category::onlyTrashed()->find($id);
        $category->restore();
        return redirect()->back()->with("success","Category Restored");
    }
}
