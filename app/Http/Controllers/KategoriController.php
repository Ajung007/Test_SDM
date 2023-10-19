<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function kategori()
    {
        $kategori = Kategori::all();

        return view('sdm.kategori', ['kategori' => $kategori]);
    }

    public function add()
    {
        return view('sdm.addkategori');
    }

    public function post(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tambah' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('sdm.add.kategori')
                ->withErrors($validator)
                ->withInput();
        }
        kategori::create([
            'kategori' => $request->tambah
        ]);

        return redirect()->route('sdm.kategori');
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);

        return view('sdm.showkategori', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $data = Kategori::find($id);
        $data->update([
            'kategori' => $request->tambah
        ]);


        return redirect()->route('sdm.kategori');

    }

}