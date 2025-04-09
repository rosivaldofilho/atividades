@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('atividades.index') }}">Atividades</a></li>
    <li class="breadcrumb-item" aria-current="page">Nova atividade</li>
@endsection

@section('title')
    <span>Criar Nova Atividade</span>
@endsection

@section('content')
    <form action="{{ route('atividades.store') }}" method="POST">
        @csrf
        @include('atividades._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection