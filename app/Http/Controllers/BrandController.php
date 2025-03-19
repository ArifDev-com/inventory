<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $brands = Brand::orderBy('id', 'DESC')->where('user_id', $authId)->get();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        $brands = Brand::latest()->get();

        return view('admin.brand.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:brands,name',
            // 'description' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        // $imag = $request->file('image');
        // $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
        // Image::make($imag)->resize(270, 270)->save('upload/brand/' . $name_gen);
        // $img_url1 = 'upload/brand/' . $name_gen;

        Brand::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            // 'image' => $img_url1,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Brand Added');
    }

    public function edit($br_id)
    {
        $brand = Brand::findOrFail($br_id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $br_id)
    {
        $br_id = $request->id;

        $brand = Brand::findOrFail($br_id);

        //   if($request->hasFile('image')){
        //     $imag = $request->file('image');
        //     $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
        //     Image::make($imag)->resize(270, 270)->save('upload/brand/' . $name_gen);
        //     $img_url = 'upload/brand/' . $name_gen;
        //   }else{
        //     $img_url = $brand->image;
        //   }

        $brand->Update([
            'name' => $request->name,
            'description' => $request->description,
            // 'image' => $img_url,
            'update_at' => Carbon::now(),
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand successfully Updated');
    }

    // public function delete($br_id)
    // {
    //     $image = Brand::findOrFail($br_id);
    //     $img = $image->image;
    //     unlink($img);

    //     Brand::findOrFail($br_id)->delete();
    //     return redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(Brand $brand)
    {
        @unlink($brand->image);
        $brand->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }
}
