@extends('layouts.sistema.painel')

@section('titulo_card')
Lista de Usuários 
@endsection

@section('content')

<card-component>
    <row-component extra_class="mb-3">
        <column-component sizes="9">
            <busca-simples 
                url-modulo="{{ route('sistema.user.index') }}"
                valor="{{ old('busca', isset($busca)? $busca : '' ) }}" 
                parametro-busca="name">
            </busca-simples>
        </column-component>
        <column-component sizes="3">
            <a href="{{ route('sistema.user.novo')}}" class="btn btn-primary float-right">Cadastrar novo</a>
        </column-component>
    </row-component>

    @include('sistema.alert.alerts')

    <data-table 
        url-modulo="{{ route('sistema.user.index') }}" 
        :columns="['id', 'name', 'email']"
        :object_data="{{ json_encode($users) }}" 
        :acao-exclusao="false" 
        :acao-edicao="true"
        url-edicao="{{ url('sistema/user/editar') }}" 
        busca="{{ old('busca', isset($busca)? $busca : '' ) }}" 
        parametro-busca="name">
    </data-table>
</card-component>
@endsection