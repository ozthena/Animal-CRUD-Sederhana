@extends('layout.app')

@section('title','Animal CRUD')

@section('header','Animal details')

@section('contents')
        <div class="mb-3">
            <label for="name" class="form-label">Animal name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$animal->name}}" readonly>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Animal description</label>
            <textarea class="form-control" id="description" name="description" rows="10" readonly>{{$animal->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="usia_rata" class="form-label">Rata-rata usia</label>
            <input type="text" class="form-control" id="usia_rata" name="usia_rata" value="{{ $animal->usia_rata }}" readonly>
        </div>
        <div class="mb-3">
            <label for="jmlkaki" class="form-label">Jumlah kaki</label>
            <select select class="form-select" id="jmlkaki" name="jmlkaki" disabled>
                <option selected>{{ $animal->jmlkaki }}</option>
                <option>2</option>
                <option>4</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="suara" class="form-label">Suara</label>
            <select class="form-select" id="suara" name="suara" disabled>
                <option selected>{{ $animal->suara }}</option>
                <option>Menggonggong</option>
                <option>Mengaum</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <img src="{{ asset('data-gambar/' . $animal->gambar) }}" class="rounded mx-auto d-block" style="width:50%" alt="{{ $animal->gambar }}">
        </div>
        <a type="button" class="btn btn-success" href="{{ route('animal-list') }}">Back</a>
@endsection