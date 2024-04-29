@extends('app.layouts.basic')
@section('title', "Fornecedores")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Fornecedor
    </div>
    @include('app.layouts._partials.menu_suppliers')
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->site }}</td>
                        <td>{{ $supplier->uf }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td><a href="{{ route('app.suppliers.edit', $supplier->id) }}">Editar</a></td>
                        <td><a href="{{ route('app.suppliers.destroy',$supplier->id) }}">Excluir</a></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <table border="1" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Peso</th>
                                        <th>Unidade</th>
                                        <th>Comprimento</th>
                                        <th>Altura</th>
                                        <th>Largura</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <p>Produtos referentes a {{ $supplier->name }}:</p>
                                    @foreach($supplier->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->weight }}</td>
                                        <td>{{ $product->unit->unit }}</td>
                                        <td>{{ $product->productDetail->length ?? '' }}</td>
                                        <td>{{ $product->productDetail->width ?? '' }}</td>
                                        <td>{{ $product->productDetail->height ?? '' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    {{ $suppliers->appends($request)->links() }}
    <br><br>
    {{ $suppliers->count() }} - registros por página <br>
    {{ $suppliers->total() }} - total de registros na consulta <br>
    {{ $suppliers->firstItem() }} - número do primeiro registro da página <br>
    {{ $suppliers->lastItem() }} - número do último registro da página <br>
</div>
@endsection
