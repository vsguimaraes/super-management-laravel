<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $msg = $request->get('msg');
        /*
        $products = [
            [
                'id' => 1,
                'name' => 'Produto 1',
                'price' => 100
            ],
            [
                'id' => 2,
                'name' => 'Produto 2',
                'price' => 200
            ],
            [
                'id' => 3,
                'name' => 'Produto 3',
                'price' => 300
            ]
            ];

        $suppliers = ['Aurora','Perdigão'];
        $clients = ['Vinicius'];
        return view('app.supplier.index', compact('suppliers', 'clients', 'products'));
        */
        $suppliers = Supplier::with('products')->paginate(10);
        return view('app.supplier.list', ['suppliers' => $suppliers,'msg' => $msg, 'request' => $request->all()]);
    }

    public function search(Request $request){
        return view('app.supplier.index');
    }

    public function list(Request $request)
    {
        //dd($request->all());
        $suppliers = Supplier::where('name', 'like', '%' . ($request->get('name') ?? '') .'%')
        ->where('site', 'like', '%' . ($request->get('site') ?? '') .'%')
        ->where('uf', 'like', '%' . ($request->get('uf') ?? '') .'%')
        ->where('email', 'like', '%' . ($request->get('email') ?? '') .'%')
        ->paginate(2);
        //dd($suppliers->all());
        return view('app.supplier.list', [
            'suppliers' => $suppliers,
            'request' => $request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' =>'required|min:3|max:40',
            'site' =>'required',
            'uf' =>'required|min:2|max:2',
            'email' =>'email|unique:suppliers'
        ];
        $messages = [
            'required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'O e-mail informado já existe',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'uf.min' => 'O campo uf deve ter 2 caracteres',
            'uf.max' => 'O campo uf deve ter 2 caracteres',
        ];

        $request->validate($rules, $messages);

        $supplier = new Supplier();
        $supplier->create($request->all());
        return redirect()->route('app.suppliers', [
            'msg' => 'Fornecedor adicionado com sucesso!'
        ]);

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
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('app.supplier.edit', [
            'id' => $id,
           'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' =>'required|min:3|max:40',
            'site' =>'required',
            'uf' =>'required|min:2|max:2',
            'email' =>'email'
        ];
        $messages = [
            'required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'O e-mail informado já existe',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'uf.min' => 'O campo uf deve ter 2 caracteres',
            'uf.max' => 'O campo uf deve ter 2 caracteres',
        ];

        $request->validate($rules, $messages);

        $supplier = Supplier::find($id);
        $supplier->update($request->all());
        return redirect()->route('app.suppliers', ['msg' => 'Fornecedor alterado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('app.suppliers', ['msg' => 'Fornecedor excluído com sucesso!']);
    }
}
