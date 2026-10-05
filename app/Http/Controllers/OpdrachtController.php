<?php

namespace App\Http\Controllers;

use App\Models\Opdracht;
use Illuminate\Http\Request;

class OpdrachtController extends Controller
{
    public function create()
    {
        return view('opdrachten.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => ['required', 'string', 'max:255'],
            'datum' => ['required', 'date'],
            'tijd' => ['required', 'date_format:H:i'],
            'duratie' => ['required', 'integer', 'min:1'],
            'opdrachtomschrijving' => ['required', 'string'],
        ]);
    
        Opdracht::create([
            'klant_id' => $request->user()->id,
            'titel' => $validated['titel'],
            'datum' => $validated['datum'] . ' ' . $validated['tijd'],
            'duratie' => $validated['duratie'],
            'opdrachtomschrijving' => $validated['opdrachtomschrijving'],
        ]);
    
        return redirect()
        ->route('opdracht.create')
        ->with('success', 'De opdracht is succesvol ingepland.');
    }
}