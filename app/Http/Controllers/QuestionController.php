<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Kategori;
use App\Models\question;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function question(Request $request)
    {
        $data = question::all();

        return view('sdm.question', ['data' => $data]);
    }

    public function add(Request $request)
    {
        $kategoris = Kategori::all();

        return view('sdm.addquestion', ['kategoris' => $kategoris]);
    }

    public function post(Request $request)
    {

        $request->all();

        $test = question::create([
            'kategoris_id ' => $request->kategoris_id,
            'pertanyaan' => $request->pertanyaan
        ]);

        dd($test);

        return redirect()->route('sdm.question');
    }

    public function edit($id)
    {
        $data = DB::table('questions')->where('id', $id)->first();

        return view('sdm.editquestion', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = question::find($id);
        $data->update([
            'pertanyaan' => $request->tambah
        ]);

        return redirect()->route('sdm.question');
    }
}