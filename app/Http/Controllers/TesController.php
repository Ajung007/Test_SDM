<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        $categories = Kategori::with([
            'categoryQuestions' => function ($query) {
                $query->inRandomOrder()
                    ->with([
                        'questionOptions' => function ($query) {
                            $query->inRandomOrder();
                        }
                    ]);
            }
        ])
            ->whereHas('categoryQuestions')
            ->get();

        // $test = Kategori::with(['categoryQuestions'])->get();

        // dd($categories);

        return view('user.tes', ['categories' => $categories]);
    }
}
