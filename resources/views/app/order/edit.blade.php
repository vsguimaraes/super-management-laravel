@extends('app.layouts.basic')
@section('title', "Pedidos")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Pedido - Editar
    </div>
    @include('app.layouts._partials.menu_orders')
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
        @component('app.order._components.form_create_edit', ['clients' => $clients, 'order' => $order])
        @endcomponent
        </div>
    </div>
</div>
@endsection
