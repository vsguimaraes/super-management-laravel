<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fornecedores</title>
</head>
<body>
    <h2>Fornecedores</h2>
    {{-- Todo este texto será ignorado pelo interpretador - comentários com blade --}}

    @php
        echo ' Estou utilizando um trecho de PHP puro<br>';
        print_r($suppliers);
        // comentários dentro deste bloco
    @endphp
    {{ 'Trecho de teste' }}<br>
    <?= 'Trecho de teste' ?><br>
    @if (count($suppliers) == 0)
        <h3>Nenhum registro de fornecedores</h3>
    @elseif (count($suppliers) == 1)
        <h3>Apenas um registro de fornecedores</h3>
    @elseif(count($suppliers) == 2)
        <h3>Dois registros de fornecedores</h3>
    @else
        <h3>Mais de dois registros de fornecedores</h3>
    @endif

    @isset($clients)
        <h3>Existem clientes</h3>
    @else
        <h3>Não existem clientes</h3>
    @endisset

    @unless (count($suppliers) == 0)
    <h3>Existem fornecedores</h3>
    @else
    <h3>Não existem fornecedores</h3>
    @endunless
    <br><br>

    {{-- Sintaxe de foreach para o caso de arrays aninhados --}}
    @foreach ($products as $i => $product)
    {{$loop->iteration}}
    <h3>Produto {{$i + 1}}</h3>
        ID: {{$product['id']}}<br>
        Nome: {{$product['name']}}<br>
        Preço: {{$product['price']}}<br>
        <hr>
    @endforeach

    {{-- O forelse é como o foreach tendo a clausula empty --}}
    @forelse ($products2 ?? [] as $i => $product)
        ID: {{$product['id']}}<br>
        Nome: {{$product['name']}}<br>
        Preço: {{$product['price']}}<br>
        <hr>
    @empty
    <h3>Nenhum registro de Produtos!</h3>
    @endforelse

    @dd($suppliers) {{-- Funciona como um print_r --}}
</body>
</html>
