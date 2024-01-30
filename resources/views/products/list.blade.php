@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista de Produtos</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Preço:</strong> R$ {{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        <a href="/home" class="btn btn-primary">Voltar para Home</a>
    </div>
</div>
@endsection
