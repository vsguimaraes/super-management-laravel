@extends('app.layouts.basic')
@section('title', "Produtos")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Produto - Editar
    </div>
    @include('app.layouts._partials.menu_products')
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
        @component('app.product._components.form_create_edit', ['units' => $units, 'product' => $product, 'suppliers' => $suppliers])
        @endcomponent
        </div>
    </div>
</div>
@endsection
