@extends('sdm.master.index')

@section('title','Tambah Option Jawaban')
@section('content')



<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
      
          <div class="card-body">
            <h3>{{ $data->pertanyaan }}</h3>
            <br>
            <form method="POST" action="{{ route('sdm.post.answer', $data->id) }}">
                @csrf                
              <div class="col-md-12 position-relative">
                <p class="form-label" for="validationTooltip03">Masukan Options jawaban :</p>
                <input type="hidden" value="{{ $data->id }}" id="idQuestion" name="idQuestion">
                <textarea class="form-control" id="jawaban" name="jawaban" placeholder="Enter your comment" required>{{ $data->jawaban }}</textarea>
              </div>
              <br>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form>
          </div>

      
        </div>
      </div>
      </div>
    </div>





 

@endsection
