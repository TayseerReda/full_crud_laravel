<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();

       $trachCat = Category::onlyTrashed()->latest()->paginate(3);
       return view('admin.Category.index', compact('categories','trachCat'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less Then 255Chars', 

        ]);

        $category=new Category();
        $category->category_name=$request->category_name;
        $category->user_id=Auth::user()->id;
        $category->save();
        return redirect()->back()->with('success','category added successfully');


        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

}
public function edit($id)
{
    $categories = Category::find($id);
   
    return view('admin.Category.edit',compact('categories'));

}
public function update(Request $request,$id)
{
    Category::find($id)->update([
       'category_name' => $request->category_name,
        'user_id' => Auth::user()->id
    ]);

    return Redirect()->route('AllCategory')->with('success','Category Updated Successfully');

}
public function SoftDelete($id){
    $delete = Category::find($id)->delete();
    return Redirect()->back()->with('success','Category Soft Delete Successfully');
}

public function pdelete($id)
{
    $trashList =Category::onlyTrashed()->find($id)->forceDelete();
    return redirect()->back()->with('success','category permanently deleted successfully');


}
public function restore($id)
{
    $trashList =Category::withTrashed()->find($id)->restore();
    return redirect()->back()->with('success','category restored successfully');

}


}
