<?php

namespace App\Http\Controllers;

use App\Models\Opdracht;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index(){
        $user = auth()->user();

        // Een lid mag alle opdrachten zien:
        if ($user->role === 'lid') {
            $opdrachten = Opdracht::all();
            } 
            // Een klant mag alleen zijn/haar opdrachten zien:
            else {
                $opdrachten = Opdracht::where('klant_id', $user->id)->get();
            }

            #Gegevens omzetten naar formaat dat FullCalendar gebruikt
            $events = $opdrachten->map(function($opdracht){
                $start = Carbon::parse($opdracht->datum);
                $end = $start->copy()->addMinutes($opdracht->duratie);

                return [
                    'id' => $opdracht->id,
                    'title' => $opdracht->titel,
                    'start' => $start->format('Y-m-d\TH:i:s'),
                    'end' => $end->format('Y-m-d\TH:i:s'),
                ];
            });

            return view('agenda.index', compact('events'));
        }
}