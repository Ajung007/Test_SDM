@extends('sdm.master.index')

@section('title','pertanyaan')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0 card-no-border">
            <a href="{{ route('sdm.add.question') }}" class="btn btn-danger">Tambah Data</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="keytable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th colspan="2">Action</th>                 
                </tr>
              </thead>
              <tbody>
                @php
                    $no=1;
                @endphp
               @forelse ($data as $item)
               <tr>
                   <td>{{ $no++ }}</td>
                   <td>{{ $item->kategori }}</td>
                   <td>{{ $item->pertanyaan }}</td>
                   <td>{{ $item->jawaban }}</td>
                   <td>
                    <a href="{{ route('sdm.edit.question' ,['id' => $item->id ])}}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('sdm.answer', $item->id) }}" class="btn btn-warning">answare</a>
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



@endsection

