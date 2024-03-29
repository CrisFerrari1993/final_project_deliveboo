<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'adress' => 'required',
            'logo' => 'required',
            'wallpaper' => 'required',
            'vat_num' => 'required',
            'category_id' => 'required',
            'visibility' => 'required',
        ];
    }

    // messaggi personalizzati per i messaggi 
    public function messages()
    {
        return [
            'name.required' => "Per favore inserire nome del ristorante",
            'adress.required' => "Per favore inseririsci un indirizzo",
            'logo.required' => "Per favore inserisci un logo",
            'wallpaper.required' => "Per favore inserisci un wallpaper",
            'vat_num.required' => "Per favore inserisci la partita iva",
            'category_id.required' => "Per favore inserisci almeno un tipo di cucina",
            'visibility.required' => "Seleziona la visibilità con cui cominciare"
        ];
    }
}
