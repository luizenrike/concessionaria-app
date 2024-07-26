@extends('layouts.main')

@section('title', $title)

@section('content')

<h1>Página de testes online</h1>
<h2>Id repassado: {{$id}}</h2>
<br>
<a href="/" class="bi bi-2-circle-fill">Teste de link</a>
<br>

<img src="/storage/app/public/img/logo_car.png" alt="aa">

<i class="bi bi-2-circle-fill">oi</i>

<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident minima rerum ducimus recusandae facere? Dolor laborum aspernatur eveniet repellendus, amet vitae facilis, inventore iusto hic id nobis, necessitatibus nulla est!</p>

@endsection