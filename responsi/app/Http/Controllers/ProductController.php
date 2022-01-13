<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtProduct = Product::all();
        return view('Admin.main', compact('dtProduct'));
    }
    public function search(Request $val)
    {
        $dtProduct = Product::where('tipe', 'like', "%{$val->val}%")->get();
        // dd($val->all());
        // dd($dtProduct);
        return view('Admin.main', compact('dtProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate( [
            'tipe'      => 'required',
            'harga'     => 'required|number',
            'ukuran'    => 'required|number',
            'stok'      => 'required|number',
            'gambar'    => 'required'
        ]);
        $nm = $request->gambar;
        $fileName = time().rand(100,999).'.'.$nm->getClientOriginalExtension();
        $nm->move(public_path().'/img', $fileName);
        // dd($request->all());
        Product::create([
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok,
            'img' => $fileName
        ]);
        return redirect('/home');
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
        $prod = Product::findorfail($id);
        return view('Admin.updateProduct', compact('prod'));
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
        $prod = Product::findorfail($id);
        // dd($request->all());
        $nm = $request->gambar;
        if($nm){
            $fileName = time().rand(100,999).'.'.$nm->getClientOriginalExtension();
            $nm->move(public_path().'/img', $fileName);
            $prod->update(['img' => $fileName]);
        }
        // $imgName = $prod->img;
        // $request->gambar->move(public_path().'img/'.$imgName);
        $prod->update($request->all());
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::findorfail($id);
        $prod->delete();
        return redirect('home');
    }
}
