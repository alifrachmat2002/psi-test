<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request)
    {
        $file = $request->file('file');
        $file_name = time().'_'.$file->getClientOriginalName();
        $file_path = 'materials/'.$file_name;
        $file->storeAs('materials',$file_name,'public');

        Material::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_path,
        ]);

        return redirect()->route('materials')->with('success', 'Materi/Panduan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:pdf|max:51200',
        ]);

        $file = $request->file('file');
        if ($file) {
            Storage::disk('public')->delete($material->file);
            $file_name = time().'_'.$file->getClientOriginalName();
            $file_path = 'materials/'.$file_name;
            $file->storeAs('materials',$file_name,'public');
        } else {
            $file_path = $material->file;
        }

        $material->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_path,
        ]);

        return redirect()->route('materials')->with('success', 'Materi/Panduan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        Storage::disk('public')->delete($material->file);
        $material->delete();

        return redirect()->route('materials')->with('success', 'Materi/Panduan berhasil dihapus');
    }
}
