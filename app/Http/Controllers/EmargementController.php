<?php

namespace App\Http\Controllers;

use App\Models\Emargement;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Session;

class EmargementController extends Controller
{
    public function index()
    {
        return view('emargement.index');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            "matricule" => "required|exists:employes"
        ]);
        $date = Carbon::now(); // 2020-09-13 18:36:09
        $today = Carbon::now()->format('Y-m-d'); // 2020-09-13
        $ref = $today . ' 00:00:00';
        $hournow = Carbon::now()->format('H:i:s'); // 18:36:09
        $londonnow = Carbon::now(new \DateTimeZone('Europe/London')); // 2020-09-13 19:36:09
        $e = Emargement::where('Matricule', '=', $request->get('matricule'))
            ->where('created_at', '>', $ref)
            ->get();
        // dd('today '.$today, 'Now '.$hournow, 'london '.$londonnow, 'date '.$date,'$date->utcOffset() '.$date->utcOffset());

        if ($request->get('emarge') == 'arrived') {
            $ifalresdyArrived = Emargement::where('Matricule', '=', $request->get('matricule'))
                ->where('created_at', '>', $ref)
                ->first();
            if (($ifalresdyArrived != null)) {
                return back()->with('info', 'Tu a déja émargé depuis : ' . substr($ifalresdyArrived->created_at, 10));
            } else {
                $emarg = new Emargement();
                $emarg->Matricule = $request->get('matricule');
                $emarg->save();
                return back()->with('success', 'Merci Bonne Journée !!!');
            }
        } else {
            $emarg = Emargement::where('Matricule', '=', $request->get('matricule'))
                ->where('created_at', '>', $ref)
                ->first();
            if ($emarg != null) {
                if ($emarg->created_at == $emarg->updated_at) {

                    Emargement::where('Matricule', '=', $request->get('matricule'))
                        ->where('created_at', '>', $ref)
                        ->update(array('Matricule' => $request->get('matricule')));
                    return back()->with('success', 'Merci A La Prochaine !!!');
                } else
                    return back()->with('info', 'Départ déja enregistré : ' . substr($emarg->updated_at, 10));
            } else
                return back()->with('info', 'Attention : Votre Arrivé n\'a pas été enrégistré !!!');
        }
    }
}