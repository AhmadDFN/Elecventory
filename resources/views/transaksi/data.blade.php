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
            <a href="{{ url('transaksi/create') }}"><button class="button-73 mb-2" id="tambahdata" role="button">
                    Tambah {{ $page }} Baru</button></a>
            <div class="table-responsive">
                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$transaksis as $item)
                            <tr>
                                {{--  @dd($transaksis)  --}}
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->trans_nota }}</td>
                                <td>{{ $item->trans_tanggal }}</td>
                                <td>{{ $item->pelanggan->pelanggan_nama }}</td>
                                <td>{{ number_format($item->trans_gtotal, '0', ',', '.') }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>
                                    <form action="{{ url($index . @$item->id) }}" method="post"
                                        id="{{ 'delete-form-' . @$item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url($index . 'nota/' . @$item->id) }}" target="blank_">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ url($index . 'nota/' . @$item->id) }}" target="blank_"
                                                role="button">Cek Nota</a>
                                        </a>
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
