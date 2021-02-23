@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}">Empresas</a></li>
    </ol>
    
    <h1>Empresas</h1>
    {{-- <h1>Empresas <a href="{{ route('tenants.create') }}" class="btn btn-dark">ADD</a></h1> --}}
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="max-width: 100px;">Imagem</th>
                        <th>Nome</th>
                        <th style="width:190px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width: 90px;">
                            </td>
                            <td>{{ $tenant->name }}</td>
                            <td class="width:10px">
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
        </div>
    </div>
@stop