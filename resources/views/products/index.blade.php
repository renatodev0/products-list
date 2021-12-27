@extends('layouts.head')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th>Nome</th>
                    <th>Tags</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td class="col-md-6">{{ $product->name }}</td>
                    <td class="">
                        @foreach ($product->tags as $tag)
                            <span class="badge alert-primary">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a title="Editar" href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a title="Excluir" href="{{ route('products.delete', $product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esse produto?');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a title="Editar" href="{{ route('products.create') }}" class="btn btn-success btn-sm">Novo</i></a>
        <a class="btn btn-secondary btn-sm" href="{{ '/' }}">Inicio</a>
    </div>
    <div class="col-md-4"></div>
</div>
<style scoped>
</style>