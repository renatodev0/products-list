@extends('layouts.head')
<div class="d-flex justify-content-center mt-5">
    <div class="row">
        <span class="display-1 text-success mt-5 mb-2 text-center">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            <p class="display-5 mt-2">TrueStock</p>
        </span>
        <a href="{{ route('products') }}" class="btn btn-primary">Produtos</a><br>
        <a href="{{ route('tags') }}" class="btn btn-success mt-2">Tags</a>
        <a href="{{ route('reports') }}" class="btn btn-secondary mt-2">Relatórios</a>
    </div>

</div>
