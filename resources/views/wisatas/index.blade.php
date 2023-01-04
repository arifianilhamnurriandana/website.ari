@extends('wisatas.layout')
@section('content')
<a class="btn btn-primary float-end" href="{{route('wisatas.create')}}">Add New</a><br><br>
<div class="row">
@foreach($wisatas as $a)

    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <img src="{{ Storage::url('public/images/'). $a->image }}" class="card-img-top" alt="...">
                <h2>{{$a->nama}}</h2>
                <th>Kota : {{$a->kota}}</th><br>
                <th>Harga Tiket : {{$a->harga_tiket}}</th><br>
                <br><a class="btn btn-success" href="{{route('wisatas.edit', $a->id)}}">Edit</a>
                <a class="btn btn-warning" href="{{route('wisatas.show', $a->id)}}">Show</a>
                <form action="{{route('wisatas.destroy', $a->id)}}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection