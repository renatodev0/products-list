@extends('layouts.head')
<div class="d-flex justify-content-center mt-5 content">
    <form action="{{ route('products.update') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
          <label for="name">Nome</label>
          <input type="text" class="form-control" name="name" placeholder="Nome do produto" value="{{ $product->name }}">
        </div>
        <input type="hidden" class="form-control" name="id" placeholder="Nome do produto" value="{{ $product->id }}">
        Tags
        <div class="overflow-auto tags">
        @foreach ($tags as $tag)
            <div class="form-check">
                @if (in_array($tag, $product->tags))
                    <input class="form-check-input" id="tag-{{$tag->id}}" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckDefault" checked>
                @else
                    <input class="form-check-input" id="tag-{{$tag->id}}" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="flexCheckDefault">
                @endif
                <label class="form-check-label" for="tag-{{$tag->id}}">
                    {{ $tag->name }}
                </label>
            </div>
        @endforeach
        </div>
        <button class="btn btn-success mt-4" type="submit">Salvar</button>
        <a class="btn btn-secondary mt-4" type="submit" href="{{ url()->previous() }}">Voltar</a>
</div>
<style>
    .content{
        height: 100%;
    }
    .tags{
        max-height: 100px !important;
        padding: 2px;
    }
}
</style>