@extends('layout.app')

@section('title','Animal CRUD')

@section('header','Add new animal')

@section('contents')
    <form action="{{ route('save-new-animal') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Animal name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Animal description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10"></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="usia_rata" class="form-label">Rata-rata usia</label>
            <input type="text" class="form-control @error('usia_rata') is-invalid @enderror" id="usia_rata" name="usia_rata"></input>
            @error('usia_rata')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jmlkaki" class="form-label">Jumlah kaki</label>
            <select class="form-select @error('jmlkaki') is-invalid @enderror" id="jmlkaki" name="jmlkaki">
                <option selected disabled>Pilih Jumlah Kaki</option>
                <option>2</option>
                <option>4</option>
            </select>
            @error('jmlkaki')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="suara" class="form-label">Suara</label>
            <select class="form-select @error('suara') is-invalid @enderror" id="suara" name="suara">
                <option selected disabled>Pilih Suara</option>
                <option>Menggonggong</option>
                <option>Mengaum</option>
            </select>
            @error('suara')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"></input>
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('animal-list') }}">Back</a>
    </form>
@endsection