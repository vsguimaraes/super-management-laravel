<div class="topo">
    <div class="logo">
        <img src="{{asset("img/logo.png")}}">
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('product.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.suppliers') }}">Fornecedores</a></li>
            <li><a href="{{ route('client.index') }}">Clientes</a></li>
            <li><a href="{{ route('order.index') }}">Pedidos</a></li>
            <li><a href="{{ route('app.logout') }}">Logout</a></li>
        </ul>
    </div>
</div>
