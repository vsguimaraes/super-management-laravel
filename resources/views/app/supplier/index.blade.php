@extends('app.layouts.basic')
@section('title', "Fornecedores")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Fornecedor
    </div>
    @include('app.layouts._partials.menu_suppliers')
    {{ $msg ?? '' }}
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
        <form action="{{ route('app.suppliers.list') }}" method="post">
            @csrf
            <div class="form-control">
                <input type="text" name="name" id="name" placeholder="Digite o nome" class="borda-preta">
            </div>
            <div class="form-control">
                <input type="text" name="site" id="site" placeholder="Digite o site" class="borda-preta">
            </div>
            <div class="form-control">
                <input type="text" name="uf" id="uf" placeholder="Digite o estado(UF)" class="borda-preta">
            </div>
            <div class="form-control">
                <input type="email" name="email" id="email" placeholder="Digite o e-mail" class="borda-preta">
            </div>
            <div class="form-control">
                <button type="submit">Pesquisar</button>
            </div>
        </form>
        </div>

    </div>
</div>
@endsection
