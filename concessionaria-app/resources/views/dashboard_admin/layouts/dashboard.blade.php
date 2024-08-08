@extends('dashboard_admin.layouts.base')

@section('body')

@include('dashboard_admin.layouts.menu')

<div class="conteudo">
    
    @include('dashboard_admin.layouts.cabecalho')
    <main>
        @yield('content')
        
    </main>
    @include('dashboard_admin.layouts.rodape')


</div>
@endsection