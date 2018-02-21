<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Product;
use App\Productstep;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('product.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        //
        $product = new Product;
        $file = $request->file('product_pic');
        $extension = $file->getClientOriginalExtension();
        $file_name = strval(time()).str_random(5).'.'.$extension;

        $destination_path = public_path().'/productpic-upload/';


        $product->user_id = $request->user()->id;
        $product->name = $request->name;
        $product->size = $request->size;
        $product->life = $request->life;
        $product->description = $request->description;
        $product->sell_url = $request->sell_url;
        $product->contact = $request->contact;

        $product->style = $request->style;
        $product->img_url = $file_name;
        $product->save();

        foreach ($request->input('intro') as $key => $step) {
            $productstep = new Productstep;

            if($request->hasFile('img_url.'.$key)) {
                $file2 = $request->file('img_url.'.$key);
                $extension = $file2->getClientOriginalExtension();
                $file_name2 = strval(time()).str_random(5).'.'.$extension;

                $destination_path2 = public_path().'/productstep-upload/';
                $productstep->img_url = $file_name2;
                $upload_success = $file2->move($destination_path2, $file_name2);

            }


            $productstep->text = $step;
            $productstep->product_id = $product->id;

            $productstep->save();
        }

        if ($request->hasFile('product_pic')) {
            $upload_success = $file->move($destination_path, $file_name);
        }   

    return redirect()->route('product.show',$product->id);
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
        $user = Auth::user();
        $product = Product::find($id);

        $steps= Productstep::where('product_id','=',$id)
        ->get();

        return view('product.intro')->with('product',$product)->withSteps($steps);
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
