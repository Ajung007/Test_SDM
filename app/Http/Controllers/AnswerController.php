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
        $items = question::all();
        
        return view('sdm.answer.index', ['data' => $data, 'items' => $items]);
    }
    
    public function post(Request $request)
    {
        answer::create([
            'questions_id' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return back();
    }

    public function show(Request $request, $id)
    {   
        $data = answer::join('questions','answers.questions_id','=','questions.id')
        ->where('answers.id', $id)
        ->first();
        
        return view('sdm.answer.show', ['data' => $data]);
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