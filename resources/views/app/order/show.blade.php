@extends('app.layouts.basic')
@section('title', "Pedidos")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Pedido - Visualizar
    </div>
    @include('app.layouts._partials.menu_orders')
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto">
        <table border="1" style="text-align: left; width: 100%;">
            <tr>
                <td>ID do Pedido:</td>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <td>Nome do Cliente:</td>
                <td>{{ $order->client->name }}</td>
            </tr>
        </table>
        <p>Produtos - <a href="{{ route('order-product.create', ['order' => $order->id]) }}">Novo Produto</a></p>
        <table border="1" style="width: 100%">
            <tr>
                <th>ID do Produto</th>
                <th>Nome do Produto</th>
                <th>Qtd</th>
                <th></th>
            </tr>
        @foreach($order->products as $product)
            <tr>
                <td><a href="{{ route('product.show', $product->id) }}">{{ $product->id }}</a></td>
                <td style="text-align: left;">{{ $product->name }}</td>
                <td>{{ $product->pivot->qty }}</td>
                <td>
                    <form id="form_{{$product->pivot->id}}" action="{{ route('order-product.destroy', $product->pivot->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="document.getElementById('form_{{$product->pivot->id}}').submit()" onclick="submit()">Excluir</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
        <hr>
        <div class="form-control">
            <a href="{{ route('order.index') }}">Voltar</a>
        </div>
        </div>

    </div>
</div>
@endsection
