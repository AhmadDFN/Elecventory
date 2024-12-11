@extends('template.template')

@section('title', $title)
@section('page-title', $page)

@section('content')

    <div class="bg-info bg-opacity-10 text-white rounded">
        @if (session('text'))
            <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                {{ session('text') }}
            </div>
        @endif
    </div>
    <form action="{{ url('categori/' . @$categori->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($categori)
            @method('PUT')
        @endisset
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-info bg-opacity-10 rounded h-100 p-4">
                        <h5 class="mb-4 text-dark">{{ @$page }}</h5>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$categori->id }}">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="categori_nama" name="categori_nama"
                                value="{{ @$categori->categori_nama }}">
                            <label for="categori_nama" class="form-label">Nama Kategori</label>
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
