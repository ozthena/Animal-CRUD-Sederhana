@extends('layout.app')

@section('title','Animal CRUD')

@section('header','Animal lists')

@section('contents')
    <a type="button" class="btn btn-primary" href="{{ route('new-animal') }}">Add new animal</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Animal name</th>
        <th scope="col">Animal description</th>
        <th scope="col">Rata-rata usia</th>
        <th scope="col">Jumlah kaki</th>
        <th scope="col">Suara</th>
        <th scope="col">Gambar</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animals as $animal)
        <tr>
            {{-- <th scope="row">{{$loop->index+1+($animals->currentPage()-1)*5}}</th> --}}
            <th scope="row">{{ $loop->index+1 }}</th>
            <td>{{$animal->name}}</td>
            <td>{{ Str::limit($animal->description,100)}}</td>
            <td>{{ $animal->usia_rata }}</td>
            <td>{{ $animal->jmlkaki }}</td>
            <td>{{ $animal->suara }}</td>
            <td><img src="{{ asset('data-gambar/' . $animal->gambar) }}" alt="{{ $animal->gambar }}" style="width:40%"></td>
            <td>
                <form action="{{ route('animal-delete', $animal->id) }}" method="POST">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        @csrf
                        <a type="button" class="btn btn-success" href="{{ route('animal-detail', $animal->id) }}">Details</a>
                        <a type="button" class="btn btn-primary" href="{{ route('animal-edit', $animal->id) }}">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau hapus?');">Delete</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{-- {{$animals->links()}} --}}
    
@endsection
