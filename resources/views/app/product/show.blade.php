@extends('app.layouts.basic')
@section('title', "Produtos")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Produto - Visualizar
    </div>
    @include('app.layouts._partials.menu_products')
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto">
        <table border="1" style="text-align: left;">
            <tr>
                <td>ID:</td>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Nome:</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Fornecedor:</td>
                <td>{{ $product->supplier->name }}</td>
            </tr>
            <tr>
                <td>Peso:</td>
                <td>{{ $product->weight }} kg</td>
            </tr>
            <tr>
                <td>Unidade de medida:</td>
                <td>{{ $product->unit->unit }}</td>
            </tr>
        </table>
        <p>Pedidos Vinculados</p>
        <table border="1" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                    <th>Nome do Cliente</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->orders as $order)
                <tr>
                    <td><a href="{{ route('order.show', $order->id) }}">{{ $order->id }}</a></td>
                    <td style="text-align:left;">{{ $order->client->name }}</td>
                    <td>{{ $order->pivot->qty }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="form-control">
            <a href="{{ route('product.edit', $product->id) }}">Editar</a>
            <a href="{{ route('product.index') }}">Voltar</a>
        </div>
        </div>

    </div>
</div>
@endsection
