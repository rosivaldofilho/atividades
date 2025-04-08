@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Criar Nova Atividade</h2>
@endsection

@section('content')
    <form action="{{ route('atividades.store') }}" method="POST">
        @csrf
        @include('atividades._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection