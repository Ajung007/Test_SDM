@extends('sdm.master.index')

@section('title','Tambah Pertanyaan')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
      
          <div class="card-body">
            <form method="POST" action="{{ route('sdm.post.question') }}">
                @csrf
                
              <div class="col-md-12 position-relative">
                <h4 class="form-label" for="validationTooltip03">Masukan Pertanyaan :</h4>
                <textarea class="form-control" id="tambah" name="tambah" placeholder="Enter your comment" required=""></textarea>
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