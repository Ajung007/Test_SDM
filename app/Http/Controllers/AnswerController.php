<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\question;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function answer(Request $request, $id)
    {
        $answer = question::find($id);
        // dd($answer);
        $data = question::select('id', 'pertanyaan')->where('id', $id)->first();
        $option = answer::join('questions', 'questions.id', '=', 'answers.questions_id')
            ->where('questions.id', $id)
            ->get();

        return view('sdm.answer', ['data' => $data, 'option' => $option, 'answer' => $answer]);
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

    public function answerUpdate(Request $request, $id)
    {
        // $answer = answer::join('questions', 'questions.id', '=', 'answers.questions_id')
        //     ->where('answers.id', $id)
        //     ->update(['jawaban' => $request->edit]);

        $answer = DB::table('answers')
            ->where('id', $id)
            ->update([
                'jawaban' => $request->edit,
            ]);

        // dd($answer);

        return back();
    }
}