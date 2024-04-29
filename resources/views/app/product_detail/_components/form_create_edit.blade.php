<table border="1" style="text-align: left;">
    <tr>
        <td>
            Nome do Produto:
        </td>
        <td>
            {{ $product_detail->product->name ?? $product->name }}
        </td>
    </tr>
    <tr>
        <td>
            Descrição:
        </td>
        <td>
            {{ $product_detail->product->description ?? $product->description }}
        </td>
    </tr>
</table><br>
@isset($product_detail->id)
    <form action="{{ route('product-detail.update', $product_detail->id) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('product-detail.store') }}" method="post">
@endisset
        @csrf
        <input type="hidden" name="product_id" value="{{ $product_detail->product_id ?? $product->id ?? '' }}">
        <div class="form-control">
            <input type="text" name="length" id="length" value="{{ $product_detail->length ?? old('length') }}" placeholder="Comprimento do produto" class="borda-preta">
            @error('length')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <input type="text" name="width" id="width" value="{{ $product_detail->width ?? old('width') }}" placeholder="Largura do produto" class="borda-preta">
            @error('width')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <input type="text" name="height" id="height" value="{{ $product_detail->height ?? old('height') }}" placeholder="Altura do produto" class="borda-preta">
            @error('height')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <select name="unit_id">
                <option value="">Selecione uma Unidade de Medida</option>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" {{ $unit->id == ($product_detail->unit_id ?? old('unit_id')) ? 'selected' : '' }}>{{ $unit->description }}</option>
                @endforeach
            </select>
            @error('unit_id')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <button type="submit">{{ isset($product_detail->id) ? 'Alterar' : 'Adicionar' }}</button>
            <a href="{{ route('product.index') }}">Cancelar</a>
        </div>
    </form>
