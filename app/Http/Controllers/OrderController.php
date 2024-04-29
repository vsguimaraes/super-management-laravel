<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::paginate(10);
        return view('app.order.index', ['orders' => $orders, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('app.order.create', ['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' =>'required',
        ], [
            'client_id.required' => 'O campo cliente é obrigatório',
        ]);

        Order::create($request->all());
        return redirect()->route('order.index', ['msg' => 'Pedido inserido com sucesso!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('app.order.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $clients = Client::all();
        return view('app.order.edit', ['clients' => $clients, 'order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' =>'required',
        ], [
            'client_id.required' => 'O campo cliente é obrigatório',
        ]);

        $order->update($request->all());
        return redirect()->route('order.index', ['msg' => 'Pedido alterado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index', ['msg' => 'Pedido excluído com sucesso!']);
    }
}
