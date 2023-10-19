@extends('sdm.master.index')

@section('title','Tambah Pertanyaan')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">      
          <div class="card-body">                
              <div class="col-md-12 position-relative">
                <form method="POST" action="{{ route('sdm.post.answer', $data->id) }}">
                    @csrf
                <h4 class="form-label" for="validationTooltip03">{{ $data->pertanyaan }}</h4>
                <input type="hidden" id="questions_id" name="questions_id" value="{{ $data->id }}">
                <br>
                    <textarea class="form-control" id="tambah" name="tambah" placeholder="Input Jawaban"></textarea>                
                    <br>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
                </form>                
              </div>
              <br>
          </div>    
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
          <div class="card">      
            <div class="card-body">                
                <div class="col-md">
                    <table class="table table-striped" id="">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Jawaban</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                         @foreach ($answer as $item)
                             <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->jawaban }}</td>
                                <td>
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $test->id }}">
                                        Edit
                                      </button>                                    
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                             </tr>
                         @endforeach
                        </tbody>    
                      </table>             
                </div>
                <br>
            </div>    
          </div>
      </div>
      </div>
  </div>


    {{-- Modal   --}}
  <div class="modal fade" id="exampleModal{{ $test->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form  method="POST" action="{{ route('sdm.update.answer', $test->id) }}">
            @csrf
            <label for="">Edit Jawaban</label>
            <input type="text" id="edit" name="edit" class="form-control">
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  {{-- End Modal --}}

@endsection
