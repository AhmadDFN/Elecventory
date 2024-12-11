<!-- Sidebar -->
<div class="sidebar d-flex flex-column">
    <h2><i class="fas fa-store"></i> Elecventory</h2>
    <hr />
    <h2 id="judul">Welcome {{ @Auth::user()->username }}</h2>
    <hr />
    <nav class="nav flex-column">
        <a href="{{ url('/') }}" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}"><i
                class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ url('/produk') }}" class="nav-link {{ $title == 'Produk' ? 'active' : '' }}"><i class="fas fa-box"></i>
            Produk</a>
        <a href="{{ url('/categori') }}" class="nav-link {{ $title == 'Categori' ? 'active' : '' }}"><i
                class="fa-solid fa-boxes-stacked"></i> Kategori</a>
        <a href="{{ url('/pengadaan') }}" class="nav-link {{ $title == 'Pengadaan' ? 'active' : '' }}"><i
                class="fa-solid fa-box-open"></i> Pengadaan</a>
        <a href="{{ url('/pelanggan') }}" class="nav-link {{ $title == 'Pelanggan' ? 'active' : '' }}"><i
                class="fa-solid fa-person"></i> Pelanggan</a>
        <a href="{{ url('/transaksi') }}" class="nav-link {{ $title == 'Transaksi' ? 'active' : '' }}"><i
                class="fa-solid fa-cart-shopping"></i> Transaksi</a>
        <a href="{{ url('/detailtransaksi') }}" class="nav-link {{ $title == 'detailTransaksi' ? 'active' : '' }}"
            target="blank_"><i class="fa-solid fa-print"></i> Laporan</a>
        <a href="{{ url('/akun') }}" class="nav-link {{ $title == 'Akun' ? 'active' : '' }}"><i
                class="fa-solid fa-user"></i> Akun</a>
        <a href="{{ route('signout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
</div>
