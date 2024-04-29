@extends('app.layouts.basic')
@section('title', "Pedido")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Pedido - Listagem
    </div>
    @include('app.layouts._partials.menu_orders')

    {{ $request['msg'] ?? '' }}
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Nome do Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->name }}</td>
                        <td><a href="{{ route('order.show', $order->id) }}">Visualizar</a></td>
                        <td><a href="{{ route('order.edit', $order->id) }}">Editar</a></td>
                        <td>
                            <form id="form_{{$order->id}}" action="{{ route('order.destroy',$order->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$order->id}}').submit()" onclick="submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    {{ $orders->appends($request)->links() }}
    <br><br>
    {{ $orders->count() }} - registros por página <br>
    {{ $orders->total() }} - total de registros na consulta <br>
    {{ $orders->firstItem() }} - número do primeiro registro da página <br>
    {{ $orders->lastItem() }} - número do último registro da página <br>
</div>
@endsection
