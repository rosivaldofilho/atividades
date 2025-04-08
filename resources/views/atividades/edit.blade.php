@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Editar Atividade</h2>
@endsection

@section('content')
    <form action="{{ route('atividades.update', $atividade->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('atividades._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection