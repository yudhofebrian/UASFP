@extends('list.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 50rem;">
        <div class="card-header bg-success text-center">
                <strong>TAMBAH DATA</strong> 
                </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                <strong>Maaf!</strong> Mohon lengkapi data!<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('list.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="mnama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" id="nip" aria-describedby="nip" placeholder="Masukkan NIP">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('list.index') }}"> Kembali</a>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection