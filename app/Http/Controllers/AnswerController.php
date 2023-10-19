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
        $data = question::find($id)->first();
        $answer = answer::join('questions', 'questions.id', '=', 'answers.questions_id')->where('questions.id', $id)->get();

        $test = DB::table('answers')->where('id', $id)->first();

        return view('sdm.answer', ['data' => $data, 'answer' => $answer, 'test' => $test]);
    }

    public function answerPost(Request $request, $id)
    {
        $data = question::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'tambah' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('sdm.answer', $data->id)
                ->withErrors($validator)
                ->withInput();
        }

        answer::create([
            'questions_id' => $request->questions_id,
            'jawaban' => $request->tambah,
        ]);

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