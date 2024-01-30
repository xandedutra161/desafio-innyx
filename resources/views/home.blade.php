@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Produtos') }}</div>

                <div class="card-body">
                    <form action="{{ route('product.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pesquisar produtos" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                    
                    <ul class="list-group">
                        @foreach($products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <div class="btn-group" role="group">
                                <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>


                <div class="card-footer">
                    
                    {{ $products->links('pagination::bootstrap-4') }}
                    <p class="mb-3"><a href="{{ route('product.list') }}">Visualizar Todos os Produtos</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection