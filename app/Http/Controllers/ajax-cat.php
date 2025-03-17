<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Carbon\Carbon;

use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function readData()
    {
        $categories = Category::latest()->get();
        return response()->json($categories, 200);
    }

    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!file_exists('upload/categories/')) {
            mkdir('upload/categories/', 666, true);
        }
        if ($request->hasFile('image')) {
            // Image have 

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('upload/categories/' . $name_gen);
            $img_url = 'upload/categories/' . $name_gen;

            Category::create([
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description,
                'image' => $img_url,
            ]);
        }

        return response()->json(['msg' => 'Category Create Success']);
    }

    // ========= edit category data 
    public function edit($cat_id)
    {
        $category = Category::find($cat_id);
        return view('admin.category.edit', compact('category'));
    }

    // ============ UpdateCat category ========= 
    public function update(Request $request, $id)
    {
        $cat_id = $request->id;

        $category = Category::find($id);
        $image = $request->file('image');
        if ($image) {
            if (file_exists('upload/categories/' . $category->image)) {
                unlink('upload/categories/' . $category->image);
            }

            $newName = 'category' . time() . '.' . $image->getclientoriginalExtension();
            $request->image->move('upload/categories', $newName);
            $category->update(['image' => $newName]);
        }

        Category::find($cat_id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return Redirect()->route('category.index')->with('Catupdated', 'Category Updated');
    }

    public function delete($cat_id)
    {
        $image = Category::findOrFail($cat_id);
        $img = $image->image;
        unlink($img);
        Category::find($cat_id)->delete();
        return response()->json(['msg' => 'Delete Success']);
    }
}
