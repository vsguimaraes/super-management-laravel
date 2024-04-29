<table border="1" style="width: 100%;">
    <tr>
        <td>ID do Pedido:</td>
        <td>{{ $order->id }}</td>
    </tr>
    <tr>
        <td>Nome do Cliente:</td>
        <td style="text-align: left;">{{ $order->client->name }}</td>
    </tr>
</table>
<p>Produtos inseridos</p>
<table border="1" style="width: 100%">
    <tr>
        <th>ID do Produto</th>
        <th>Nome do Produto</th>
        <th>Qtd</th>
    </tr>
@foreach($order->products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td style="text-align: left;">{{ $product->name }}</td>
        <td>{{ $product->pivot->qty }}</td>
    </tr>
@endforeach
</table>
<br>
    <form action="{{ route('order-product.store', $order->id) }}" method="post">
        @csrf
        <div class="form-control">
            <select name="product_id">
                <option value="">Selecione um Produto</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == old('product_id') ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <input type="number" name="qty" value="{{ old('qty') }}" placeholder="Digite a quantidade do produto">
            @error('qty')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <button type="submit">Adicionar</button>
            <a href="{{ route('order.show', [$order->id]) }}">Voltar</a>
        </div>
    </form>
