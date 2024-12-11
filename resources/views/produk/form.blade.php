@extends('template.template')

@section('title', $title)
@section('page-title', $page)

@section('content')

    <div class="bg-primary rounded">
        @if (session('text'))
            <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                {{ session('text') }}
            </div>
        @endif
    </div>
    <form action="{{ url('produk/' . @$produk->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($produk)
            @method('PUT')
        @endisset
        <div class="container-fluid pt-1 px-0">
            <div class="row g-4 bg-primary bg-opacity-10 p-3 pb-5">
                <div class="col-4">
                    <div class="bg-light rounded h-100 p-4">
                        {{--  @dd($produk)  --}}
                        <img id="photo-preview" class="thumb-menu-big"
                            src="{{ @$produk->produk_foto != '' ? asset($produk->produk_foto) : asset('assets/img/no-image.webp') }}"
                            alt="">
                        <input type="file" class="thumb-menu-big" name="foto" id="photo-input" style="display:none"
                            value="{{ old('file') ? old('file') : @$produk->produk_foto }}">
                        <textarea name="foto" id="foto" cols="30" rows="10" style="display:none">{{ @$produk->name }}</textarea>
                        {{--  <input type="file" class="mt-2" name="foto" id="foto">  --}}
                        @error('foto')
                            <div id="foto" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="bg-primary bg-opacity-50 rounded h-100 p-4">
                        <h5 class="mb-4 text-dark">{{ @$page }}</h5>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ @$produk->id }}">
                            <input type="hidden" name="produk_stok" value="{{ @$produk->produk_stok }}">
                            <input type="hidden" name="old_foto" value="{{ @$produk->produk_foto }}">
                            <input type="text" class="form-control" id="produk_nama" name="produk_nama"
                                value="{{ @$produk->produk_nama }}">
                            <label for="produk_nama" class="form-label">Nama Produk</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" name="produk_id_cat">
                            <option value="1" selected>Kategori</option>
                            @if ($categories == '')
                                <option value="1">Belum ada kategori</option>
                            @endif
                            @foreach (@$categories as $item)
                                <option value="{{ @$item->id }}"
                                    {{ @$item->id == @$produk->produk_id_cat ? 'selected' : '' }}>
                                    {{ @$item->categori_nama }}</option>
                            @endforeach
                        </select>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="produk_harga" name="produk_harga"
                                value="{{ @$produk->produk_harga }}" style="text-align: right">
                            <label for="produk_harga" class="form-label">Harga Produk</label>
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
