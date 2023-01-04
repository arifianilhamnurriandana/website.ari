@extends('wisatas.layout')
@section('content')
<form action="{{route('wisatas.store')}}" method="post" style="text-align: center;" enctype="multipart/form-data">
@csrf
<label for="">Nama</label>
<input class="form-control text-center" type="text" name="nama" id=""><br>
<label for="">Kota</label>
<input class="form-control text-center" type="text" name="kota" id=""><br>
<label for="">Harga Tiket</label>
<input class="form-control text-center" type="number" name="harga_tiket" id=""><br>
<label for="">Deskripsi</label>
<textarea class="form-control text-center" name="deskripsi" id="" cols="30" rows="10"></textarea><br>
<label for="">Image</label>
<input class="form-control text-center" type="file" name="image" id="" style="display: center;"><br>
<input class="form-control btn btn-primary" type="submit" value="Add Wisata"><br><br>
</form>
@endsection
