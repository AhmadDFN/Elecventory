<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Http\Requests\StoreCategoriRequest;
use App\Http\Requests\UpdateCategoriRequest;

class CategoriController extends Controller
{
    protected $index = 'categori.index';
    protected $route = 'categori/';
    protected $view = 'categori.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Categori",
            'page' => 'Data Categori',
            "categories" => Categori::All(),
            'add' => $this->route . "create",
            'index' => $this->route,
        ];
        return view($this->view . "data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Categori",
            'page' => 'Tambah Categori',
            'save' => $this->route . "store",
            'index' => $this->route,
            'categories' => Categori::all(),
            // 'is_update' => false,
        ];
        return view($this->view . "form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriRequest $request)
    {
        // dd($request);
        $data = $request->all();
        Categori::create($data);
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categori $categori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categori $categori)
    {
        $data = [
            "title" => "Categori",
            'page' => 'Edit Data Categori',
            'categori' => $categori,
            'save' => $this->route . "update",
            'index' => $this->route,
            'is_update' => true,
        ];

        return view($this->view . "form", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriRequest $request, Categori $categori)
    {
        $categori->fill($request->all());
        // dd($categori);
        $categori->save();
        return redirect()->route($this->index);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categori $categori)
    {
        $categori->delete();
        return redirect()->route($this->index);
    }
}
