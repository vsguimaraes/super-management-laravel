@extends('app.layouts.basic')
@section('title', "Clientes")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Clientes - Listagem
    </div>
    @include('app.layouts._partials.menu_clients')

    {{ $request['msg'] ?? '' }}
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td><a href="{{ route('client.show', $client->id) }}">Visualizar</a></td>
                        <td><a href="{{ route('client.edit', $client->id) }}">Editar</a></td>
                        <td>
                            <form id="form_{{$client->id}}" action="{{ route('client.destroy',$client->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$client->id}}').submit()" onclick="submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    {{ $clients->appends($request)->links() }}
    <br><br>
    {{ $clients->count() }} - registros por página <br>
    {{ $clients->total() }} - total de registros na consulta <br>
    {{ $clients->firstItem() }} - número do primeiro registro da página <br>
    {{ $clients->lastItem() }} - número do último registro da página <br>
</div>
@endsection
