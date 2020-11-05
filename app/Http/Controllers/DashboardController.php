<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        $data['title_form'] = 'List Produk';
        return view('admin.products.index', $data);
        // return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsDetails($id = null)
    {
        $params = [];

        $object = Product::where('id', $id)->first();
        if(!$object)
            {
                return redirect()->route('products');
            }

        $params['products'] = $object;
        $params['title_form'] = 'Detail Product';
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.products.details', $params);
    }

    public function productsUpdate($id = null)
    {
        $params = [];

        if($id){
            $object = Product::where('id', $id)->first();
            if(!$object)
                {
                    return redirect()->route('products');
                }
            $params['title_form'] = "Update Product";
        }else{
            $object = "";
            $params['title_form'] = "Add Product";
        }

        $params['products'] = $object;
// $arr = get_defined_vars();
//             dd($arr);
        return view('admin.products.update', $params);
    }

    public function saveProducts(Request $request, $id = Null)
    {
        $data = $request->all();
        if($id == 0 ){
            $rules =  ['product_nama'  => 'required|unique:tbl_produk,nama_produk' ,'product_image' => 'required', 'product_harga' => 'required', 'product_stock' => 'required'];
            $atributname = [
              'product_nama.required' => 'The product name field is required.',
              'product_nama.unique' => 'The product name can not be the same.',
              'product_harga.required' => 'The product harga field is required.',
            ];
        }else{
        $rules =  ['product_nama'  => 'required' , 'product_image' => 'required', 'product_harga' => 'required', 'product_stock' => 'required'];
        $atributname = [
          'product_nama.required' => 'The product name field is required.',
          'product_harga.required' => 'The product harga field is required.',
        ];
        }

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            if($id == 0 ){
                $p        =  new Product; 

                $cover = $request->file('product_image');
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getClientOriginalName(),  File::get($cover));

                $p->nama_produk                 = $request->product_nama;
                // $file = $request->file('product_image');
                // $path = Storage::disk('public')->put('uploads/'.date('FY'), $file);

                $p->image                       = $cover->getClientOriginalName();
                $p->harga                       = $request->product_harga;
                $p->stock                       = $request->product_stock;
                $p->save();

              Session::flash('success-message', "Success add banner" );
              return redirect()->route('products');

            }else{
                $cover = $request->file('product_image');
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getClientOriginalName(),  File::get($cover));

              $data = array(
                'nama_produk'                  => $request->product_nama,
                'image'             => $cover->getClientOriginalName(),
                'harga'             => $request->product_harga,
                'stock'               => $request->product_stock
              );
              Product::where('id', $id)->update($data);

              Session::flash('success-message', "Success update product" );
              return redirect()->route('products');

            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
