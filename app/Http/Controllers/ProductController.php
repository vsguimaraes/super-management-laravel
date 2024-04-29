<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // eager loading - passando mais de uma tabela relacionada no with
        $products = Product::with(['supplier', 'unit'])->paginate(10);
        // lazy loading - coloquei o carregamento de product_detail fora do with e funciona normalmente
        // lazy loading - o carregamento dos detalhes do produto só acontece a partir da primeira chamada com product_details lá na view
        return view('app.product.index', [
            'products' => $products,
            'request' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        $suppliers = Supplier::all();
        return view('app.product.create', ['units' => $units, 'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' =>'required|min:3|max:50',
            'description' =>'required|min:3|max:100',
            'weight' =>'required',
            'unit_id' =>'exists:units,id'
        ];

        $messages = [
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 50 caracteres',
            'description.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'description.max' => 'O campo descrição deve ter no máximo 100 caracteres',
            'required' => 'O campo :attribute é obrigatório',
            'unit_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($rules, $messages);

        $product = new Product();
        $product->create($request->all());
        return redirect()->route('product.index', [
           'msg' => 'Produto adicionado com sucesso!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('app.product.show', ['product' => $product->with('supplier')->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        $suppliers = Supplier::all();
        return view('app.product.edit', ['product' => $product, 'units' => $units, 'suppliers' => $suppliers]);
        //return view('app.product.create', ['product' => $product, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' =>'required|min:3|max:50',
            'description' =>'required|min:3|max:100',
            'weight' =>'required',
            'unit_id' =>'required'
        ];

        $messages = [
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 50 caracteres',
            'description.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'description.max' => 'O campo descrição deve ter no máximo 100 caracteres',
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($rules, $messages);
        $product->update($request->all());
        return redirect()->route('product.index', ['msg' => 'Produto alterado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index', ['msg' => 'Produto excluído com sucesso!']);
    }
}
