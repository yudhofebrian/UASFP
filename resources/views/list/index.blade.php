@extends('list.layout')
<br>
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
        <div class="card-header bg-succes text-center">
                <strong>Aplikasi perekaman data Pegawai </strong> 
                </div>
            <br>
            <div class="text-center">
                
            </div>
            <div class="text-center">
               
            </div>
@section('content')
    <br>
    
    <br>
   
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="succes">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($list as $datahp)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $datahp->image }}" width="100px"></td>
            <td>{{ $datahp->nama }}</td>
            <td>{{ $datahp->nip }}</td>
            <td>{{ $datahp->alamat }}</td>
            <td>
                <form action="{{ route('list.destroy',$datahp->id) }}" method="POST">
    
                    <a class="btn btn-primary btn-sm" href="{{ route('list.edit',$datahp->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
                
            </td>
        </tr>
        @endforeach
        
    </table>
    <div class="row-bottom">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-left">
                <a class="btn btn-primary" href="{{ route('list.create') }}">Tambah Data Baru</a>
                <a href="/exportpdf" class="btn btn-warning">Export PDF</a>
            </div>
        </div>
    </div>
    <div class="text-bottom">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>
  
    {!! $list->links() !!}
      
@endsection