@extends('template.template')

@section('title', $title)
@section('page-title', $page)

@section('content')
    @if (session('mess'))
        <div class="col-sm-4">
            <div class="d-flex align-items-center justify-content-between p-4">
                !!!Notif
                <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                    {{ session('mess') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card p-3">
                <h3>Transaksi</h3>
                <h5>{{ $total_transaksi }} Order</h5>
                <a href="{{ url('/transaksi') }}" class="btn btn-primary">Lihat Detail</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h3>Produk</h3>
                <h5>{{ $total_produk }} Produk</h5>
                <a href="{{ url('/produk') }}" class="btn btn-primary">Lihat Produk</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h3>Pelanggan</h3>
                <h5>{{ $total_pelanggan }} Pelanggan</h5>
                <a href="{{ url('/pelanggan') }}" class="btn btn-primary">Lihat Pelanggan</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <h3>Kategori</h3>
                <h5>{{ $total_categori }} Kategori</h5>
                <a href="{{ url('/categori') }}" class="btn btn-primary">Lihat Kategori</a>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h3>Pendapatan Pertahun</h3>
                <h5>Rp {{ number_format($rev_year, '0', ',', '.') }}</h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h3>Pendapatan Perbulan</h3>
                <h5>Rp {{ number_format($rev_month, '0', ',', '.') }}</h5>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h3>Pendapatan Perminggu</h3>
                <h5>Rp {{ number_format($rev_week, '0', ',', '.') }}</h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h3>Pendapatan Hari ini</h3>
                <h5>Rp {{ number_format($rev_day, '0', ',', '.') }}</h5>
            </div>
        </div>
    </div>
    {{--  <!-- Statistik -->
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">👥</div>
                <h5>Total Pelanggan</h5>
                <h4>{{ $total_pelanggan }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">📦</div>
                <h5>Total Produk</h5>
                <h4>{{ $total_produk }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">💳</div>
                <h5>Total Transaksi</h5>
                <h4>{{ $total_transaksi }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">👤</div>
                <h5>Total User</h5>
                <h4>{{ $total_user }}</h4>
            </div>
        </div>
    </div>

    <!-- Pendapatan -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">💰</div>
                <h5>Pertahun</h5>
                <h4>Rp {{ number_format($rev_year->total, '0', ',', '.') }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">📆</div>
                <h5>Perbulan</h5>
                <h4>Rp {{ number_format($rev_month->total, '0', ',', '.') }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">📅</div>
                <h5>Perminggu</h5>
                <h4>Rp {{ number_format($rev_week, '0', ',', '.') }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">⏰</div>
                <h5>Perhari</h5>
                <h4>Rp {{ number_format($rev_day->total, '0', ',', '.') }}</h4>
            </div>
        </div>
    </div>

    <!-- Uang Muka -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card p-4 border border-warning bg-light text-center">
                <div class="card-icon">🧾</div>
                <h5>Total Uang Muka</h5>
                <h4>Rp {{ number_format($hutang->total, '0', ',', '.') }}</h4>
            </div>
        </div>
    </div>  --}}

@endsection
