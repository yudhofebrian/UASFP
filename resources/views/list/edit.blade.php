@extends('list.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 50rem;">
        <div class="card-header bg-dark text-center text-white">
                <strong>EDIT DATA</strong>
                </div>
                <div class="card-body">
                <a class="btn btn-primary" href="{{ route('list.index') }}"> Kembali</a>
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
            <form action="{{ route('list.update',$list->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $list->nama }}" aria-describedby="merk_hp" placeholder="Masukkan Merk HP">
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" id="nip" value="{{ $list->nip }}" aria-describedby="nip" placeholder="Masukkan NIP">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $list->alamat }}" aria-describedby="alamat" placeholder="Masukkan NIP">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $list->image }}" width="300px">
                </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection