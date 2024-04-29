@isset($product->id)
    <form action="{{ route('product.update', $product->id) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('product.store') }}" method="post">
@endisset
        @csrf
        <div class="form-control">
            <select name="supplier_id">
                <option value="">Selecione um Fornecedor</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == ($product->supplier_id ?? old('supplier_id')) ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <input type="text" name="name" id="name" value="{{ $product->name ?? old('name') }}" placeholder="Digite o nome do produto" class="borda-preta">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <input type="text" name="description" id="description" value="{{ $product->description ?? old('description') }}" placeholder="Digite a descrição do produto" class="borda-preta">
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <input type="text" name="weight" id="weight" value="{{ $product->weight ?? old('weight') }}" placeholder="Digite o peso" class="borda-preta">
            @error('weight')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <select name="unit_id">
                <option value="">Selecione uma Unidade de Medida</option>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" {{ $unit->id == ($product->unit_id ?? old('unit_id')) ? 'selected' : '' }}>{{ $unit->description }}</option>
                @endforeach
            </select>
            @error('unit_id')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <button type="submit">{{ isset($product->id) ? 'Alterar' : 'Adicionar' }}</button>
            <a href="{{ route('product.index') }}">Cancelar</a>
        </div>
    </form>
