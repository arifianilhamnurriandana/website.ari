@extends('wisatas.layout')
@section('content')
<th><img src="{{ Storage::url('public/images/'). $wisatas->image }}" class="rounded" style="width: 500px"></td></th><br><br>
<h1>{{$wisatas->nama}}</h1>
<th>Lokasi : {{$wisatas->kota}}</th><br>
<th>Harga Tiket : {{$wisatas->harga_tiket}}</th><br>
<th>Deskripsi</th><br>
{{$wisatas->deskripsi}}
<a class="form-control btn btn-warning" href="{{route('wisatas.index')}}">Home</a><br><br>
@endsection