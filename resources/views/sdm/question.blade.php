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
          <div class="dt-ext table-responsive">
            <table class="table table-striped" id="keytable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Action</th>                 
                </tr>
              </thead>
              <tbody>
                @php
                    $no=1;
                @endphp
               @foreach ($data as $item)
               <tr>
                   <td>{{ $no++ }}</td>
                   <td>{{ $item->pertanyaan }}</td>
                   <td>
                    <a href="{{ route('sdm.edit.question', $item->id) }}" class="btn btn-primary">Edit</a>
                   </td>
                </tr>
               @endforeach
              </tbody>
     
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</div>



@endsection

