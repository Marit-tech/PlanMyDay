<?php

namespace App\Http\Controllers;

use App\Models\Opdracht;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index(){
        $user = auth()->user();

        $opdrachten = Opdracht::all();

            #Gegevens omzetten naar formaat dat FullCalendar gebruikt
            $events = $opdrachten->map(function($opdracht) use ($user){
                $start = Carbon::parse($opdracht->datum);
                $end = $start->copy()->addMinutes($opdracht->duratie);

                $event = [
                    'id' => $opdracht->id,
                    'title' => $user->role === 'klant' && $opdracht->klant_id !== $user->id ? 'Opdracht' : $opdracht->titel,
                    'start' => $start->format('Y-m-d\TH:i:s'),
                    'end' => $end->format('Y-m-d\TH:i:s'),
                ];
                if ($user->role === 'klant' && $opdracht->klant_id !== $user->id) {
                    $event['color'] = '#cf2121';
                }

                if ($user->role === 'lid' || $opdracht->klant_id === $user->id) {
                    $event['url'] = route('opdracht.show', $opdracht);
                }
                return $event;
                
            });

            return view('agenda.index', compact('events'));
        }
}