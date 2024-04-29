@isset($order->id)
    <form action="{{ route('order.update', $order->id) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('order.store') }}" method="post">
@endisset
        @csrf
        <div class="form-control">
            <select name="client_id">
                <option value="">Selecione um Cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == ($order->client_id ?? old('client_id')) ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <button type="submit">{{ isset($order->id) ? 'Alterar' : 'Adicionar' }}</button>
            <a href="{{ route('order.index') }}">Cancelar</a>
        </div>
    </form>
