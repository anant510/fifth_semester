<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $datas = Product::simplePaginate(1);
        return view('product.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if($request->image){
        //     // $request->validate([
        //     //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // ]);
        //    $imageName = time().'.'.$request->image->extension();  
        //    $data =  $request->image->move(public_path('images'), $imageName); 
        // }

       


        // dd($request->name);
        $data = new Product();

        if($file = $request->file('image')){
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            
            $data->image = $name;
        }

        $data->name = $request->name;
        $data->price = $request->price;
        $data->qty = $request->qty;

        $data->save(); 


        return redirect()->route('product.index')->with('message', 'Product Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        // dd($data);
        return view('product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        $image_path = public_path() .  '/images/' . $data->image;
        if($file = $request->file('image')){
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $data->image = $name;
        }   


        
        $data->name = $request->name;
        $data->price = $request->price;
        $data->qty = $request->qty;
        $data->save();

        return redirect()->route('product.index')->with('message','Updated Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        // dd($data);

        $image_path = public_path() .  '/images/' . $data->image;
        if($data->image){
             if(file_exists($image_path)){
             unlink($image_path);
             }
        } 
        $data->delete();

        return redirect()->route('product.index')->with('message','Product Deleted Sucessfully');
    }

    public function search(Request $request)
    {   
        $data = $request->search;
        $datas = Product::where('name', 'LIKE', "%{$data}%")->get();
        // dd($datas);
        return view('product.search',compact('datas'));
    }
}
