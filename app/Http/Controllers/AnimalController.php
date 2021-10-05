<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::all();
        Paginator::useBootstrap();
        return view('animal.list',compact('animals'));
    }

    public function newanimal(){
        return view('animal.new');
    }

    public function savenewanimal(Request $request){
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|min:10',
            'usia_rata' => 'required|numeric|gt:0',
            'jmlkaki' => 'required',
            'suara' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg|max:5408' //dalam KB,
        ]);
        
        // Animal::create($request->all());
        $newImageName = $request->name . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('data-gambar'), $newImageName);

        Animal::create([
            'name' => $request-> input('name'),
            'description'=> $request->input('description'),
            'usia_rata'=> $request->input('usia_rata'),
            'jmlkaki'=> $request->input('jmlkaki'),
            'suara'=> $request->input('suara'),
            'gambar'=> $newImageName
        ]);
        return redirect(route('animal-list'));
    }

    public function animaldetail($id){
        $animal = Animal::find($id);
        return view('animal.detail',compact('animal'));
    }

    public function animaledit($id){
        $animal = Animal::find($id);
        return view('animal.edit',compact('animal'));
    }

    public function saveedit(Request $request, $id){
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|min:10',
            'usia_rata' => 'required|numeric|gt:0',
            'jmlkaki' => 'required',
            'suara' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg|max:5408' //dalam KB,
        ]);

        $animal = Animal::find($id);

        if($request->hasFile('gambar')){
            $editImageName = $request->name . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('data-gambar'), $editImageName);
            $animal->gambar = $editImageName;
        }
        
        $animal->name = $request->name;
        $animal->description = $request->description;
        $animal->usia_rata = $request->usia_rata;
        $animal->jmlkaki = $request->jmlkaki;
        $animal->suara = $request->suara;
        $animal->save();
        return redirect(route('animal-list'));
    }

    public function deleteanimal($id){
        $animal = Animal::find($id);
        // $animal->is_delete = 1;
        // $animal->save();
        $animal->delete();
        return redirect(route('animal-list'));
    }
}
