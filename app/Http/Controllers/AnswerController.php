<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\question;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{

    public function index()
    {
        $data = answer::join('questions','answers.questions_id','=','questions.id')->get();

        return view('sdm.answer.index', ['data' => $data]);
    }

    public function show(Request $request, $id)
    {
   
        $data = answer::join('questions','answers.questions_id','=','questions.id')->where('answers.id', $id)->first();

        // dd($questions);
        
        return view('sdm.answer.show', ['data' => $data]);
    }

    public function post(Request $request, $id)
    {
        $data = question::find($id);

        $data = answer::create([
            'questions_id' => $request->idQuestion,
            'jawaban' => $request->jawaban,
        ]);
        // dd($data);

        return back();
    }

    public function update(Request $request, $id)
    {

        $data = answer::where('id', $id);
        $data->update([
            'jawaban' => $request->editJawaban
        ]);



        return back();
    }
}