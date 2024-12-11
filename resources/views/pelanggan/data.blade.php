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
            <a href="{{ url('pelanggan/create') }}"><button class="button-73 mb-2" id="tambahdata" role="button">Tambah
                    {{ $page }}</button></a>
            <div class="table-responsive">
                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggans as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->pelanggan_nama }}</td>
                                <td>{{ $item->pelanggan_nik }}</td>
                                <td>{{ $item->pelanggan_alamat }}</td>
                                <td>{{ $item->pelanggan_kota }}</td>
                                <td>{{ $item->pelanggan_telp }}</td>
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
