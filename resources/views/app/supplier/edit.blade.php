@extends('app.layouts.basic')
@section('title', "Fornecedores")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Fornecedor - Edição
    </div>
    @include('app.layouts._partials.menu_suppliers')
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
        <form action="{{ route('app.suppliers.update', $id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-control">
                <input type="text" name="name" id="name" value="{{ $supplier->name }}" placeholder="Digite o nome" class="borda-preta">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-control">
                <input type="text" name="site" id="site" value="{{ $supplier->site }}" placeholder="Digite o site" class="borda-preta">
                @error('site')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-control">
                <input type="text" name="uf" id="uf" value="{{ $supplier->uf }}" placeholder="Digite o estado(UF)" class="borda-preta">
                @error('uf')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-control">
                <input type="email" name="email" value="{{ $supplier->email }}" readonly id="email" placeholder="Digite o e-mail" class="borda-preta">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-control">
                <button type="submit">Alterar</button>
            </div>
        </form>
        </div>

    </div>
</div>
@endsection
