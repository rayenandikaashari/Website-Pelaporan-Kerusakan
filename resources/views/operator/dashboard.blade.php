
@extends('layouts.operator')

@section('title', 'Dashboard Operator')
@section('heading', 'Dashboard Operator')
@section('description', 'Ringkasan laporan kerusakan mesin Anda.')

@section('content')

<section class="welcome">
    <p>Selamat datang kembali,</p>

    <h2>{{ auth()->user()->name }}</h2>

    <p>Pantau laporan kerusakan mesin yang telah Anda buat.</p>

    <a class="button" href="{{ route('operator.laporan.create') }}">
        + Buat Laporan
    </a>
</section>

<section class="stats">
    <div class="card">
        <div class="muted">Total Laporan</div>
        <div class="number">0</div>
    </div>

    <div class="card">
        <div class="muted">Menunggu Ditangani</div>
        <div class="number">0</div>
    </div>

    <div class="card">
        <div class="muted">Selesai Diperbaiki</div>
        <div class="number">0</div>
    </div>
</section>

<section class="panel">
    <h3>Laporan Terbaru</h3>

    <p class="muted">
        Laporan yang Anda buat akan tampil di sini.
    </p>

    <p>Belum ada laporan.</p>
</section>

@endsection
