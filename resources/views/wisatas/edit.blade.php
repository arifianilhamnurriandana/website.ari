@extends('wisatas.layout')
@section('content')
<form action="{{route('wisatas.update', $wisata -> id)}}" method="post" style="text-align: center;" enctype="multipart/form-data">
@csrf
@method('PUT')
<label for="">Nama</label>
<input class="form-control text-center" type="text" name="nama" id="" value="{{$wisata->nama}}"><br>
<label for="">Kota</label>
<input class="form-control text-center" type="text" name="kota" id="" value="{{$wisata->kota}}"><br>
<label for="">Harga Tiket</label>
<input class="form-control text-center" type="text" name="harga_tiket" id="" value="{{$wisata->harga_tiket}}"><br>
<label for="">Deskripsi</label>
<textarea class="form-control text-center" name="deskripsi" id="" cols="30" rows="10" value="{{$wisata->deskripsi}}"></textarea><br>
<label for="">Image</label>
<input class="form-control text-center" type="file" name="image" id=""><br>
<input class="form-control btn btn-primary" type="submit" value="Update"><br><br>
</form>
@endsection