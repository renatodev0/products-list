@extends('layouts.head')
<div class="d-flex justify-content-center mt-5 content">
    <form action="{{ route('tags.update') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name" placeholder="Nome da tag" value="{{ $tag->name }}">
        </div>
        <input type="hidden" class="form-control" name="id" value="{{ $tag->id }}">
        <button class="btn btn-success mt-4" type="submit">Salvar</button>
        <a class="btn btn-secondary mt-4" type="submit" href="{{ url()->previous() }}">Voltar</a>
</div>
<style>
    .content{
        height: 100%;
    }
}
</style>