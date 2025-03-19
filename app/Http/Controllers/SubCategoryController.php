<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $category = Category::latest()->get();
        $subCategories = SubCategory::with('user')->where('user_id', $authId)->orderBy('id', 'DESC')->get();

        return view('admin.subCategory.index', compact('subCategories', 'category'));
    }

    public function create()
    {
        $authId = Auth::user()->id;
        $categories = Category::latest()->where('user_id', $authId)->get();
        $subCategories = SubCategory::latest()->get();

        return view('admin.subCategory.create', compact('subCategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required|max:255',
            // 'category_id' => 'required|max:255',
            'name' => 'required|max:255|unique:sub_categories,name',
            // 'code' => 'required|max:255',
            // 'description' => 'required',
        ]);

        SubCategory::insert([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        // return redirect()->route('subCategory.index')->with('success', 'SubCategory Added');
        return redirect()->back()->with('success', 'SubCategory Added');
    }

    public function edit($subCat_id)
    {
        $authId = Auth::user()->id;
        $categories = Category::latest()->where('user_id', $authId)->get();
        $subCategory = SubCategory::findOrFail($subCat_id);

        return view('admin.subCategory.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $subCat_id)
    {
        $subCat_id = $request->id;

        SubCategory::findOrFail($subCat_id)->Update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'update_at' => Carbon::now(),
        ]);

        return redirect()->route('subCategory.index')->with('success', 'SubCategory successfully Updated');
    }

    // public function delete($subCat_id)
    // {
    //     SubCategory::findOrFail($subCat_id)->delete();
    //     return redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }
}
