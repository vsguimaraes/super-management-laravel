@isset($client->id)
    <form action="{{ route('client.update', $client->id) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('client.store') }}" method="post">
@endisset
        @csrf
        <div class="form-control">
            <input type="text" name="name" id="name" value="{{ $client->name ?? old('name') }}" placeholder="Digite o nome do Cliente" class="borda-preta">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-control">
            <button type="submit">{{ isset($client->id) ? 'Alterar' : 'Adicionar' }}</button>
            <a href="{{ route('client.index') }}">Cancelar</a>
        </div>
    </form>
