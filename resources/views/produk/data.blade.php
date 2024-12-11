@extends('template.template')

@section('title', $title)
@section('page-title', $page)

@section('content')

    <div class="bg-info rounded">
        @if (session('text'))
            <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                {{ session('text') }}
            </div>
        @endif
    </div>
    <div class="col-12">
        <div class="rounded p-4 bg-info bg-opacity-10" style="min-height: 65vh;">
            <a href="{{ url('produk/create') }}"><button class="button-73 mb-2" id="tambahdata" role="button">Tambah
                    {{ $page }}</button></a>
            <div class="table-responsive">
                <table id="dtCustomer" class="dtTable table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  @dd($produks)  --}}
                        @foreach ($produks as $item)
                            {{--  @dd($item)  --}}
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    @if ($item->produk_foto != '')
                                        <img class="thumb-menu" src="{{ asset($item->produk_foto) }}"
                                            alt="{{ $item->produk_nama }}">
                                    @else
                                        <img class="thumb-menu" src="{{ asset('assets/img/no-image.webp') }}"
                                            alt="{{ $item->produk_nama }}">
                                    @endif
                                </td>
                                <td>{{ @$item->produk_nama }}</td>
                                <td>{{ @$item->categori->categori_nama }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            Rp.
                                        </div>
                                        <div class="col-9 text-end">
                                            {{ number_format($item->produk_harga, '0', ',', '.') }}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center" style="color:{{ @$item->produk_stok >= 1 ? 'blue' : 'red' }};">
                                    {{ @$item->produk_stok }}</td>
                                <td>
                                    <form action="{{ url($index . @$item->id) }}" method="post"
                                        id="{{ 'delete-form-' . @$item->id }}">
                                        <a href="{{ url($index . @$item->id . '/edit') }}"><i
                                                class="text-warning fas fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-transparent mt-0"><i
                                                class="text-danger fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
