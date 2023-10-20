@extends('sdm.master.index')

@section('title','Tambah Option Jawaban')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
      
          <div class="card-body">
            {{-- <h3>{{ $answer->pertanyaan }}</h3> --}}
            <br>
            <form method="POST" action="#">
                @csrf
                @foreach ($categories as $category)
                <div class="card mb-3">
                    <div class="card-header">{{ $category->kategori }}</div>
    
                    <div class="card-body">
                        @foreach($category->categoryQuestions as $question)
                            <div class="card @if(!$loop->last)mb-3 @endif">
                                <div class="card-header">{{ $question->pertanyaan }}</div>
            
                                <div class="card-body">
                                    <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                    @foreach($question->questionOptions as $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                            <label class="form-check-label" for="option-{{ $option->id }}">
                                                {{ $option->jawaban }}
                                            </label>
                                        </div>
                                    @endforeach

                                    @if($errors->has("questions.$question->id"))
                                        <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                            <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                @endforeach                
             
              <br>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form>
          </div>

        </div>
      </div>       
    </div>

 

@endsection
