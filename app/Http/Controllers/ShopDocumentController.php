<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ShopDocument;

use Intervention\Image\Facades\Image;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShopDocumentController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $shopDocuments = ShopDocument::where('user_id',$authId)->orderBy('id', 'DESC')->get();
        return view('admin.shop_document.index', compact('shopDocuments'));
    }

    public function create()
    {
        $shopDocuments = ShopDocument::latest()->get();
        return view('admin.shop_document.create', compact('shopDocuments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'required|max:255',
            // 'phone' => 'required|max:255',
            // 'address' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif,jfif',
        ]);

        $imag = $request->file('image');                
        $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension(); 
        Image::make($imag)->resize(468, 249)->save(public_path('upload/shop/'.$name_gen)); 
        $img_url = 'upload/shop/'.$name_gen;
   
        // $image_one = $request->image_three;

    //     $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
    //    $path = public_path('upload/shop/'.$name_gen);
    //     Image::make($imag->getRealPath())->resize(468,249)->save($path);
    //     $data['image'] = 'upload/shop/'.$name_gen;


        ShopDocument::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $img_url,
            // 'image' => $name_gen,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('shopDocument.index')->with('success', 'Shop Document Added');
    }

    public function edit($shopDoc_id)
    {
        $shopDocument = ShopDocument::findOrFail($shopDoc_id);
        return view('admin.shop_document.edit', compact('shopDocument'));
    }

    public function update(Request $request, $shopDoc_id)
    {
        $shopDoc_id = $request->id;

        $shopDocument = ShopDocument::findOrFail($shopDoc_id);

        if($request->hasFile('image')){
            $imag = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('upload/shop/' . $name_gen));
            $img_url = 'upload/shop/' . $name_gen;
          }else{
            $img_url = $shopDocument->image;
          }
    

        ShopDocument::findOrFail($shopDoc_id)->Update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $img_url,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('shopDocument.index')->with('success', 'Shop Document successfully Updated');
    }

    // public function destroy($shopDoc_id)
    // {
    //     $image = ShopDocument::findOrFail($shopDoc_id);
    //     $img = $image->image;
    //     unlink($img);

    //     ShopDocument::findOrFail($shopDoc_id)->delete();
    //     return Redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(ShopDocument $shopDocument)
{
    $shopDocument->delete();
    return Redirect()->back()->with('delete', 'successfully Deleted');
}
}
