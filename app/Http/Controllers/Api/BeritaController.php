<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        return response()->json(Berita::latest()->paginate(15));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string',
            'konten' => 'required|string',
            'penulis_id' => 'required|integer|exists:users,id',
            'gambar' => 'nullable|string'
        ]);

        $berita = Berita::create($data);

        return response()->json(['message' => 'Berita created', 'berita' => $berita], 201);
    }
}
