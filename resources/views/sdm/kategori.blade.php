@extends('sdm.master.index')

@section('title','Kategori')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0 card-no-border">
            <a href="{{ route('sdm.add.kategori') }}" class="btn btn-warning">Tambah Kategori</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="keytable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Action</th>                 
                </tr>
              </thead>
              <tbody>
                @php
                    $no=1;
                @endphp
               @forelse ($kategori as $item)
               <tr>
                   <td>{{ $no++ }}</td>             
                   <td>{{ $item->kategori }}</td>
                   <td>
                    <a href="{{ route('sdm.show.kategori', $item->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('sdm.delete.kategori', $item->id) }}" class="btn btn-danger">Delete</a>
                   </td>
                                
                </tr>
                @empty
                <tr>
                    <td colspan="5">Kosong</td>
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

