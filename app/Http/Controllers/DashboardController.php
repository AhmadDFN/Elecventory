<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\User;
use App\Models\Hutang;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $index = 'dashboard.index';
    protected $route = 'dashboard/';
    protected $view = 'dashboard.';

    public function index()
    {
        // dd(Transaksi::count());
        if (Transaksi::count() == 0) {
            $rev_year = 0;
            $rev_month = 0;
            $rev_week = 0;
            $rev_day = 0;
            $hutang = 0;
        } else {
            $rev_year = DB::select("
            SELECT SUM(trans_gtotal - trans_ppn) AS total 
            FROM transaksis 
            WHERE YEAR(trans_tanggal) = YEAR(CURDATE())
        ");

            $rev_month = DB::select("
        SELECT SUM(trans_gtotal - trans_ppn) AS total 
        FROM transaksis 
        WHERE YEAR(trans_tanggal) = YEAR(CURDATE()) 
        AND MONTH(trans_tanggal) = MONTH(CURDATE())
    ");

            $rev_week = DB::select("
    SELECT SUM(trans_gtotal - trans_ppn) AS total 
    FROM transaksis 
    WHERE YEAR(trans_tanggal) = YEAR(CURDATE()) 
    AND WEEK(trans_tanggal, 1) = WEEK(CURDATE(), 1)
");
            $rev_day = DB::select("
    SELECT SUM(trans_gtotal - trans_ppn) AS total 
    FROM transaksis 
    WHERE DATE(trans_tanggal) = CURDATE()
");

            // $hutang = DB::select("SELECT SUM(pelanggan_hutang) AS total FROM pelanggans");
        }

        // $data = [
        //     "total_user" => User::count(),
        //     "total_pelanggan" => Pelanggan::count(),
        //     "total_produk" => Produk::count(),
        //     "total_transaksi" => Transaksi::count(),
        //     "rev_year" => $rev_year[0],
        //     "rev_month" => $rev_month[0],
        //     "rev_week" => $rev_week ? $rev_week[0]->total : 0,
        //     "rev_day" => $rev_day[0],
        //     "hutang" => $hutang[0],
        //     "title" => "Dashboard",
        //     'page' => 'Dashboard',
        // ];

        $data = [
            "total_user" => User::count(),
            "total_pelanggan" => Pelanggan::count(),
            "total_produk" => Produk::count(),
            "total_transaksi" => Transaksi::count(),
            "total_categori" => Categori::count(),
            "rev_year" => $rev_year ? $rev_year[0]->total : 0,
            "rev_month" => $rev_month ? $rev_month[0]->total : 0,
            "rev_week" => $rev_week ? $rev_week[0]->total : 0,
            "rev_day" => $rev_day ? $rev_day[0]->total : 0,
            "title" => "Dashboard",
            'page' => 'Dashboard',
        ];

        // dd($data);
        return view("dashboard", $data);
    }

    public function report()
    {
        $data = [
            "title" => "Report",
            'page' => 'Dashboard',
        ];

        return view("detailtransaksi.report", $data);
    }
}
