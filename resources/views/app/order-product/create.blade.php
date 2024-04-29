@extends('app.layouts.basic')
@section('title', "Pedidos")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Pedido - Adicionar Produtos
    </div>
    @include('app.layouts._partials.menu_orders')
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            @component('app.order-product._components.form_create', ['order' => $order, 'products' => $products])
            @endcomponent
        </div>

    </div>
</div>
@endsection
