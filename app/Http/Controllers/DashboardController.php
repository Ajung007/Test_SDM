<?php

namespace App\Http\Controllers;

use App\Models\question;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('sdm.home');
    }

    public function question(Request $request)
    {
        $data = question::all();

        return view('sdm.question', ['data' => $data]);
    }

    public function add(Request $request)
    {
        return view('sdm.addquestion');
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
                ->route('sdm.add.question')
                ->withErrors($validator)
                ->withInput();
        }

        $data = question::create([
            'pertanyaan' => $request->tambah
        ]);

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