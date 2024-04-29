@extends('app.layouts.basic')
@section('title', "Clientes")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Cliente - Visualizar
    </div>
    @include('app.layouts._partials.menu_clients')
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto">
        <table border="1" style="text-align: left;">
            <tr>
                <td>ID:</td>
                <td>{{ $client->id }}</td>
            </tr>
            <tr>
                <td>Nome:</td>
                <td>{{ $client->name }}</td>
            </tr>
        </table>
        <div class="form-control">
            <a href="{{ route('client.index') }}">Voltar</a>
        </div>
        </div>

    </div>
</div>
@endsection
