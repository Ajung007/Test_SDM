@extends('sdm.master.index')

@section('title','pertanyaan')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0 card-no-border">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addData">
                Tambah Data
            </button>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="keytable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th>Action</th>                 
                </tr>
              </thead>
              <tbody>
                @php
                    $no=1;
                @endphp
               @forelse ($data as $item)
               <tr>
                   <td>{{ $no++ }}</td>
                   <td>{{ $item->pertanyaan }}</td>
                   <td>{{ $item->jawaban }}</td>
                   <td>
                    <a href="{{ route('sdm.show.answer', ['id' => $item->id] )}}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('sdm.delete.question', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                   </td>                  
                </tr>
                @empty
                <tr>
                  <td colspan="4">Data Kosong</td>
                </tr>
               @endforelse
              </tbody>     
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
    <form action="{{ route('sdm.post.answer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDataLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="" class="form-label">Pilih Pertanyaan</label>
                <select name="pertanyaan" id="" class="form-control">
                    <option value="" disabled selected>pilih pertanyaan</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->pertanyaan }}</option>
                    @endforeach
                </select>
            </div>
            <br>
          <div class="form-group">
            <label for="" class="form-label">Tambah Data Jawaban</label>
            <input type="text" class="form-control" placeholder="Masukan Jawaban" name="jawaban">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
    </form>
</div>



@endsection

