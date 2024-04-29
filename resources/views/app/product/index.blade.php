@extends('app.layouts.basic')
@section('title', "Produtos")
@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        Produtos - Listagem
    </div>
    @include('app.layouts._partials.menu_products')

    {{ $request['msg'] ?? '' }}
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <td>Comprimento</td>
                        <td>Altura</td>
                        <td>Largura</td>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->supplier->name }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>{{ $product->unit->unit }}</td>
                        <td>{{ $product->productDetail->length ?? '' }}</td>
                        <td>{{ $product->productDetail->width ?? '' }}</td>
                        <td>{{ $product->productDetail->height ?? '' }}</td>
                        <td>
                            @isset($product->productDetail->id)
                                <a href="{{ route('product-detail.edit',$product->id) }}">Detalhes</a></td>
                            @else
                                <a href="{{ route('product-detail.create', ['product_id' => $product->id]) }}">Detalhes</a></td>
                            @endisset

                        <td><a href="{{ route('product.show', $product->id) }}">Visualizar</a></td>
                        <td><a href="{{ route('product.edit', $product->id) }}">Editar</a></td>
                        <td>
                            <form id="form_{{$product->id}}" action="{{ route('product.destroy',$product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$product->id}}').submit()" onclick="submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    {{ $products->appends($request)->links() }}
    <br><br>
    {{ $products->count() }} - registros por página <br>
    {{ $products->total() }} - total de registros na consulta <br>
    {{ $products->firstItem() }} - número do primeiro registro da página <br>
    {{ $products->lastItem() }} - número do último registro da página <br>
</div>
@endsection
