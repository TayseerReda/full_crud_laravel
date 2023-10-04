<?php

namespace App\Http\Controllers;

use App\Brand;
use App\MultiPics;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands= Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_img' => 'required|mimes:jpg.jpeg,png',
            
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_img.min' => 'Brand Longer then 4 Characters', 
        ]);

        $brand_image=$request->file('brand_img');
        $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        $up_location='image/brand/';
        $ac_location=$up_location. $name_gen;
        $brand_image->move($up_location,$name_gen);

        Brand::insert([

            'brand_name'=>$request->brand_name,
            'brand_img'=> $ac_location,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','Brand added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $old_img=$request->old_img;
        $brand_img=$request->file('brand_img');
        if($brand_img)
        {

            $brand_image=$request->file('brand_img');
            $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            $up_location='image/brand/';
            $ac_location=$up_location. $name_gen;
            $brand_image->move($up_location,$name_gen);

            unlink($old_img);
            $brand=Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_img'=> $ac_location,
            'created_at' => Carbon::now(),
            ]);
            
        }
        else 
        {
            $brand=Brand::find($id)->update([

                'brand_name'=>$request->brand_name,
                'created_at' => Carbon::now(),
                ]);  
        }
       
        return redirect()->back()->with('success','brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_img;
        unlink($old_image);

        Brand::find($id)->delete();
        return redirect()->back()->with('success','brand delete Successfully');
    }

    public function Multpic()
    {
        $images=MultiPics::all();
        return view('admin.multipic.index',compact('images'));
    }

    public function StoreImg(Request $request)
    {
        $images=$request->file('images');
         foreach( $images as $image)
         {
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $up_location='image/multi/';
            $ac_location=$up_location. $name_gen;
            $image->move($up_location,$name_gen);
    
             MultiPics::insert([
                'images'=> $ac_location,
                'created_at' => Carbon::now()

            ]);
         }
            

        return redirect()->back()->with('success','images added successfully');


    }
}
