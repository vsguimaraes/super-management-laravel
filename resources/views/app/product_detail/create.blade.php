@extends('app.layouts.basic')
@section('title', "Detalhes do Produto")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Adicionar Detalhes do Produto
    </div>
    @include('app.layouts._partials.menu_product_details')
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            @component('app.product_detail._components.form_create_edit', ['units' => $units, 'product' => $product])
            @endcomponent
        </div>

    </div>
</div>
@endsection
