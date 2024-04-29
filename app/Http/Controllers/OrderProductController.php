<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $products = Product::all();
        return view('app.order-product.create', compact('order', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {
        $rules = [
            'product_id' =>'exists:products,id',
            'qty' =>'required|numeric'
        ];
        $messages = [
            'product_id.exists' => 'O produto informado não existe!',
            'qty.required' => 'A quantidade do produto é obrigatória!',
            'qty.numeric' => 'A quantidade do produto deve ser um número!'
        ];
        $request->validate($rules, $messages);

        /*
        $order_product = new OrderProduct();
        $order_product->product_id = $request->get('product_id');
        $order_product->order_id = $order->id;
        $order_product->qty = $request->get('qty');
        $order_product->save();
        */
        // da forma acima dá certo mas existe um método mais correto, utilizando o attach

        $order->products()->attach(
            $request->get('product_id'),
            ['qty' => $request->get('qty')]
        );
        // em $order já tem o primeiro campo necessário do relacionamento - $order_id em orders_products
        // o primeiro campo é o id do produto - segunda chave do relacionamento - $product_id em orders_produts
        // o segundo campo é a quantidade do produto

        // return redirect()->route('order.show', [$order->id]);
        return redirect()->route('order-product.create', [$order->id]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderProduct $order_product)
    {
        $order_product->delete();
        return redirect()->route('order.show', [$order_product->order_id]);
    }

    /*
    public function destroy(Order $order, Product $product)
    {
        // Método 1
        //OrderProduct::where([
        //    'order_id' => $order->id,
        //    'product_id' => $product->id
        //])->delete();

        // Método 2 - exclui por meio do relacionamento
        //$order->products()->detach($product->id);
        // o contrario também é aceito
        $product->orders()->detach($order->id);
        // em $order já tem o primeiro campo necessário do relacionamento - $order_id em orders_products
        // $product_id é o segundo campo do relacionamento
        // lembrando que o ideal é que não hajam duplicidades.

        return redirect()->route('order.show', [$order->id]);
    }
    */
}
