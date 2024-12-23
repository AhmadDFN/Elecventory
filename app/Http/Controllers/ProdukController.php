<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Categori;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    protected $index = 'produk.index';
    protected $route = 'produk/';
    protected $view = 'produk.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with('categori')->get();
        $data = [
            "title" => "Produk",
            'page' => 'Data Produk',
            // "produks" => Produk::with('categori')->get(),
            "produks" => $produks,
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        // dd($data);
        return view($this->view . "data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Categori::with('produk')->get()) {
            $categories = Categori::with('produk')->get();
        } else {
            $categories = '';
        }
        $data = [
            "title" => "Produk",
            'page' => 'Tambah Produk',
            'categories' => $categories,
            'save' => $this->route . "store",
            'index' => $this->route,
            // 'is_update' => false,
        ];

        // dd($data);
        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        $namaData = str_replace(" ", "", $request->input("produk_nama"));
        if ($request->file("foto")) {
            $fileName = time() . "-" . $namaData . '.' . $request->file("foto")->extension();
            $result = $request->file("foto")->move(public_path('uploads/produk/foto'), $fileName);
            $foto = "uploads/produk/foto/" . $fileName;
        } else {
            $foto = $request->input("old_foto");
        }
        $requestData = $request->all();
        $requestData["produk_foto"] = $foto;
        $requestData["produk_stok"] = 0;
        // dd($requestData);
        Produk::create($requestData);
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        if (Categori::with('produk')->get()) {
            $categories = Categori::with('produk')->get();
        } else {
            $categories = '';
        }
        $data = [
            "title" => "Produk",
            'page' => 'Edit Data Produk',
            'produk' => $produk,
            'categories' => $categories,
            'save' => $this->route . "update",
            'index' => $this->route,
            'is_update' => true,
        ];
        return view($this->view . "form", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $namaData = str_replace(" ", "", $request->input("produk_nama"));
        if ($request->file("foto")) {
            $fileName = time() . "-" . $namaData . '.' . $request->file("foto")->extension();
            $result = $request->file("foto")->move(public_path('uploads/produk/foto'), $fileName);
            $foto = "uploads/produk/foto/" . $fileName;
        } else {
            $foto = $request->input("old_foto");
        }
        $requestData = $request->all();
        $requestData["produk_foto"] = $foto;
        $produk->fill($requestData);
        // dd($produk);
        $produk->save();
        return redirect()->route($this->index);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $namePhoto = public_path($produk->foto);
        if (File::exists($namePhoto)) {
            File::delete($namePhoto);
        }

        $produk->delete();
        return redirect()->route($this->index);
    }
}
