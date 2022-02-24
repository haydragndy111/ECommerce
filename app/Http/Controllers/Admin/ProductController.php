<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products = Product::paginate(4);
        // $users = User::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageuploaded = "/" . $destinationPath . $profileImage;
            $product->image = $imageuploaded;
        }
        // $product->image = $imageuploaded;
        $product->save();
        // dd($product);
        $products = Product::all();
        // dd($success);
        return redirect('/admin/products')->with('success','Product '.$product->name.' created');
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
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $product=Product::findOrFail($id);
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        if ($image = $request->file('image')) {
            File::delete(public_path($product->image));
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageuploaded = "/" . $destinationPath . $profileImage;
            $product->image = $imageuploaded;
        }
        $product->save();
        // $products = Product::all();
        // return view('backend.users.index',compact('users','success','User Information Updated Successfully!'));
        return redirect('/admin/products')->with('success','product '.$product->name .' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $product=Product::findOrFail($id);
        File::delete(public_path($product->image));
        $name = $product->name;
        $product->delete();
        // return view('backend.users.index',compact('users','success','User Information Updated Successfully!'));
        return redirect('/admin/products')->with('success','product '.$name .' deleted');
    }
}
