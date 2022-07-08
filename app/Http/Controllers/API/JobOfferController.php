<?php

namespace App\Http\Controllers\API;

use App\Models\JobOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les offres
        $jobOffers = DB::table('joboffers')
            ->get()
            ->toArray();
        // On retourne les informations des offres en JSON
        return response()->json([
            'status' => 'Success',
            'data' => $jobOffers,
        ]);
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
            'nameJobOffer' => 'required|max:100',
        ]);
        // On crée un nouvel utilisateur
        $jobOffer = JobOffers::create([
            'nameJobOffer' => $request->nameJobOffer,
        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'status' => 'Success',
            'data' => $jobOffer,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobOffers  $jobOffers
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffers $jobOffers)
    {
        return response()->json($jobOffers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobOffers  $jobOffers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobOffers $jobOffers)
    {
        $this->validate($request, [
            'nameJobOffer' => 'required|max:100',
            'answer_id' => $request->answer_id,
        ]);
        // On crée un nouvel utilisateur
        $jobOffers->update([
            'nameJobOffer' => $request->nameJobOffer,

        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'status' => 'Mise à jour avec succèss'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobOffers  $jobOffers
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffers $jobOffers)
    {
        $jobOffers->delete();
        // On retourne la réponse JSON
        return response()->json([
            'status' => 'Supprimer avec succès avec succés'
        ]);
    }
}
