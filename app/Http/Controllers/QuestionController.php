<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\answer;
use App\Models\Kategori;
use App\Models\question;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function question(Request $request)
    {
        $data = question::join('kategoris', 'kategoris.id', '=', 'questions.kategoris_id')
            ->select('kategoris.kategori', 'questions.id as id', 'questions.pertanyaan')
            ->get();
        // $data = question::with(['category', 'questionOptions'])->get();

        return view('sdm.question', ['data' => $data]);
    }


    public function add(Request $request)
    {
        $kategoris = Kategori::all();

        return view('sdm.addquestion', ['kategoris' => $kategoris]);
    }

    public function post(QuestionRequest $request)
    {

        $test = question::create([
            'kategoris_id' => $request->kategoris_id,
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()->route('sdm.question');
    }

    public function edit($id)
    {
        $kategoris = Kategori::all();

        $data = question::join('kategoris', 'kategoris.id', '=', 'questions.kategoris_id')
            ->select('kategoris.kategori', 'questions.id as id', 'questions.pertanyaan', 'kategoris.id as idKategori')
            ->where('questions.id', $id)
            ->first();

        return view('sdm.editquestion', ['data' => $data, 'kategoris' => $kategoris]);
    }

    public function update(Request $request, $id)
    {
        $data = question::find($id);

        $data->update([
            'kategoris_id' => $request->kategoris_id,
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()->route('sdm.question');
    }

    public function delete($id)
    {
        $data = question::find($id);
        $data->delete();

        return redirect()->route('sdm.question');
    }
}