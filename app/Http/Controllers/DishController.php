<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facedes\Auth;

// regole di validazione
use App\Http\Requests\DishFormRequest;


use App\Models\Restaurant;
use App\Models\Dish;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dishes = Dish::all();

        return view('dishes.dish', compact('dishes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|gt:0',
            'aviability' => 'required',
        ], [
            'name.required' => "Per favore inserire nome piatto",
            'description.required' => 'L\'inserimento di una descrizione è obbligatorio',
            'image.required' => "Per favore inserire un'immagine",
            'price.required' => "Per favore inserire il prezzo del piatto",
            'price.gt' => "Per favore inserire un prezzo positivo",
            'aviability.required' => "Per favore indicare la disponibilità attuale",
        ]);
        $data = $request->all();
        $restaurant_id = $request->user()->restaurant->id;

        // $data['image']? $img = $data['image'] :null;
        if ($request->hasFile('image')) {
            $img = $data['image'];
            $img_path = Storage::disk('public')->put('images', $img);
        } else {
            // Se non è stata fornita un'immagine, assegna un valore vuoto al percorso dell'immagine
            $img_path = '';
        }

        $dish = new Dish();

        $dish->name = $data['name'];
        $dish->image = $img_path;
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->aviability = $data['aviability'];

        $dish->restaurant()->associate($restaurant_id);

        $dish->save();

        return redirect()->route('restaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);

        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);

        return view('dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|gt:0',
            'aviability' => 'required',
        ], [
            'name.required' => "Per favore inserire nome piatto",
            'description.required' => 'L\'inserimento di una descrizione è obbligatorio',
            'image.required' => "Per favore inserire un'immagine",
            'price.required' => "Per favore inserire il prezzo del piatto",
            'price.gt' => "Per favore inserire un prezzo positivo",
            'aviability.required' => "Per favore indicare la disponibilità attuale",
        ]);

        $data = $request->all();

        $restaurant_id = $request->user()->restaurant->id;

        $dish = Dish::find($id);

        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->aviability = $data['aviability'];

        if ($request->hasFile('image')) {
            $img = $data['image'];
            $img_path = Storage::disk('public')->put('images', $img);
            $dish->image = $img_path;
        }


        $dish->save();


        return redirect()->route('restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('restaurant.index');
    }
}
