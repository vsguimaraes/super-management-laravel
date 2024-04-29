@extends('app.layouts.basic')
@section('title', "Clientes")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Cliente - Adicionar
    </div>
    @include('app.layouts._partials.menu_clients')
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            @component('app.client._components.form_create_edit')
            @endcomponent
        </div>

    </div>
</div>
@endsection
