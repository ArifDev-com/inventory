<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $categories = Category::with('user')->where('user_id',$authId)->orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            // 'user_id' => 'required|max:255',
            'name' => 'required|max:255||unique:categories,name',
            // 'code' => 'required|max:255',
            // 'description' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        // $imag = $request->file('image');
        
    //       $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
    //    $path = public_path('upload/category/'.$name_gen);
    //     Image::make($imag->getRealPath())->resize(468,249)->save($path);
    //     $data['image'] = 'upload/category/'.$name_gen;


    Category::insert([
        'user_id' => Auth::id(),
        'name' => $request->name,
        'code' => $request->code,
        'description' => $request->description,
        //  'image' => $name_gen,
        'created_at' => Carbon::now(),
    ]);

return Redirect()->back()->with('success', 'Category Added');



      

        






        // if($request->name){
        //     Category::insert([
        //         'user_id' => Auth::id(),
        //         'name' => $request->name,
        //         'code' => $request->code,
        //         'description' => $request->description,
        //         //  'image' => $name_gen,
        //         'created_at' => Carbon::now(),
        //     ]);
    
        //     return Redirect()->route('category.index')->with('success', 'Category Added');
        // }else{
        //     return Redirect()->route('category.index')->with('success', 'Category Added');
        // }

       

       

 
    }

    public function edit($cat_id)
    {
        $category = Category::findOrFail($cat_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $cat_id)
    {
        $cat_id = $request->id;

        $category = Category::findOrFail($cat_id);

    //   if($request->hasFile('image')){
    //     $imag = $request->file('image');
      
    //     $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
    //     $path = public_path('upload/category/'.$name_gen);
    //     Image::make($imag->getRealPath())->resize(468,249)->save($path);
    //     $data['image'] = 'upload/category/'.$name_gen;
        
    //   }else{
    //     $name_gen= $category->image;
    //   }

    $category->Update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            // 'image' => $name_gen,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('category.index')->with('success', 'Category successfully Updated');
    }

    public function destroy(Category $category)
    {
        @unlink($category->image);
        $category->delete();
        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

}
