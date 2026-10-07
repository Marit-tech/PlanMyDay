<?php

namespace App\Http\Controllers;

use App\Models\Opdracht;
use Carbon\Carbon;
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
        $start = Carbon::parse(
            $validated['datum'] . ' ' . $validated['tijd']
        );
        $eind = $start->copy()->addMinutes((int) $validated['duratie']);

        $conflict = Opdracht::where('datum', '<', $eind)
        ->get()
        ->contains(function ($opdracht) use ($start) {
            $bestaandEind = Carbon::parse($opdracht->datum)
            ->addMinutes($opdracht->duratie);
            return $bestaandEind > $start;
        });
        if ($conflict) {
            return back()
            ->withInput()
            ->withErrors(
                ['tijd' => 'Dit tijdstip is niet beschikbaar. Er staat al een andere opdracht gepland.']
            );
        }
    
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
    public function show(Opdracht $opdracht)
    {
        $user = auth()->user();
    
        if ($user->role === 'klant' && $opdracht->klant_id !== $user->id) {
            abort(403, 'Je hebt geen toegang tot deze opdracht.');
        }
        return view('opdrachten.show', compact('opdracht'));
    }

    public function updateBeschrijving(Request $request, Opdracht $opdracht)
    {
        $eindtijd = $opdracht->datum->copy()->addMinutes((int) $opdracht->duratie);
        if (now()->lt($eindtijd)) {
            return back()->withErrors([
                'beschrijving' => 'Je kunt pas na afloop van de opdracht een beschrijving toevoegen.'
            ]);
        }
        $validated = $request->validate([
            'beschrijving' => ['required', 'string'],
        ]);
    
        $opdracht->update([
            'beschrijving' => $validated['beschrijving'],
        ]);
    
        return redirect()
        ->route('opdracht.show', $opdracht)
        ->with('success', 'De beschrijving is opgeslagen.');
    }
}