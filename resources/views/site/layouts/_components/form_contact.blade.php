{{ $slot }}
<form action="{{ route('site.contact') }}" method="POST">
    @csrf
    <input type="text" name="name" value="{{old('name')}}" placeholder="Nome" class="borda-{{ $border }}">
    {{ $errors->has('name') ? $errors->first('name'): '' }}
    <br>
    <input type="tel" name="phone" placeholder="Telefone" value="{{old('phone')}}" class="borda-{{ $border }}">
    {{ $errors->has('phone') ? $errors->first('phone'): '' }}
    <br>
    <input type="email" name="email" placeholder="E-mail" value="{{old('email')}}" class="borda-{{ $border }}">
    {{ $errors->has('email') ? $errors->first('email'): '' }}
    <br>
    <select name="reason_contacts_id" class="borda-{{ $border }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{old('reason_contacts_id') == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
        @endforeach
    </select>
    {{ $errors->has('reason_contacts_id') ? $errors->first('reason_contacts_id'): '' }}
    <br>
    <textarea name="message" class="borda-{{ $border }}">{{empty(old('message')) ? 'Preencha aqui a sua mensagem' : old('message')}}</textarea>
    {{ $errors->has('message') ? $errors->first('message'): '' }}
    <br>
    <button type="submit" class="borda-{{ $border }}">ENVIAR</button>
</form>

