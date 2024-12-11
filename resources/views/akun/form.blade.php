@extends('template.template')

@section('title', $data->title)
@section('page-title', $data->page)

@section('content')

    <div class="bg-info bg-opacity-10 rounded">
        @if (session('text'))
            <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                {{ session('text') }}
            </div>
        @endif
    </div>
    <form action="{{ url('akun/' . @$akun->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($akun)
            @method('PUT')
        @endisset
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4">
                <div class="col">
                    <div class="bg-info bg-opacity-10 rounded h-100 p-4">
                        <h5 class="mb-4 text-dark">{{ @$data->page }}</h5>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$akun->id }}">
                            <input type="text" class="form-control" id="email" name="username"
                                value="{{ @$akun->username }}" {{ @$akun->id ? 'disabled' : '' }}>
                            <label for="username" class="form-label">Nama Anda</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$akun->id }}">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ @$akun->email }}" {{ @$akun->id ? 'disabled' : '' }}>
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" value="">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
