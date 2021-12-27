@extends('layouts.head')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th>Nome</th>
                    <th>Total de produtos</th>
                </tr>
            </thead>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->tag }}</td>
                    <td class="col-md-6">{{ $tag->nome }}</td>
                    <td>
                        {{ $tag->total }}
                    </td>
                </tr>
            @endforeach
        </table>
        <a title="Editar" href="{{ route('tags.create') }}" class="btn btn-success btn-sm">Novo</i></a>
        <a class="btn btn-secondary btn-sm" href="{{ '/' }}">Inicio</a>
    </div>
    <div class="col-md-4"></div>
</div>
<style scoped>
</style>