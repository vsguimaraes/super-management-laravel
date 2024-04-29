<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product = Product::find($request->get('product_id'));
        $units = Unit::all();
        return view('app.product_detail.create', ['units' => $units, 'product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'product_id' =>'required|unique:product_details',
            'length' =>'required',
            'width' =>'required',
            'height' =>'required',
            'unit_id' =>'required',
        ];

        $messages = [
            'product_id.required' => 'O campo ID do produto é obrigatório',
            'length.required' => 'O campo comprimento é obrigatório',
            'width.required' => 'O campo largura é obrigatório',
            'height.required' => 'O campo altura é obrigatório',
            'unit_id.required' => 'O campo unidade de medida é obrigatório',
        ];

        $request->validate($rules, $messages);
        ProductDetail::create($request->all());
        return redirect()->route('product.index', ['msg' => 'Detalhe incluído com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDetail $productDetail)
    {
        $units = Unit::all();
        // eager loading (with passando o nome da função que contém o relacionamento)
        return view('app.product_detail.edit', ['product_detail' => $productDetail, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        $rules = [
            'product_id' =>'required',
            'length' =>'required',
            'width' =>'required',
            'height' =>'required',
            'unit_id' =>'required',
        ];

        $messages = [
            'product_id.required' => 'O campo ID do produto é obrigatório',
            'length.required' => 'O campo comprimento é obrigatório',
            'width.required' => 'O campo largura é obrigatório',
            'height.required' => 'O campo altura é obrigatório',
            'unit_id.required' => 'O campo unidade de medida é obrigatório',
        ];

        $request->validate($rules, $messages);
        $productDetail->update($request->all());
        return redirect()->route('product.index', ['msg' => 'Detalhe alterado com sucesso!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
