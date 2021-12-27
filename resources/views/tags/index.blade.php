@extends('layouts.head')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td class="col-md-6">{{ $tag->name }}</td>
                    <td>
                        <a title="Editar" href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a title="Excluir" href="{{ route('tags.delete', $tag->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esse produto?');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
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