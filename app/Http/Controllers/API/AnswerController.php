<?php

namespace App\Http\Controllers\API;

use App\Models\Answers;
use App\Models\JobOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les offres
        $answers = DB::table('answers')
            ->join('joboffers', 'joboffer.id', '=', 'answers.joboffer_id')
            ->get()
            ->toArray();
        // On retourne les informations des offres en JSON
        return response()->json([
            'status' => 'Success',
            'data' => $answers,
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
            'statusAnswer' => 'required|max:100',
        ]);
        // On crée une nouvelle réponse
        $answer = Answers::create([
            'statusAnswer' => $request->statusAnswer,
            'joboffer_id' => $request->joboffer_id,

        ]);
        // On retourne les informations du nouvel réponse en JSON
        return response()->json([
            'status' => 'Success',
            'data' => $answer,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answers  $anwers
     * @return \Illuminate\Http\Response
     */
    public function show(Answers $answers)
    {
        return response()->json($answers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anwers  $anwers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answers $answers)
    {
        $this->validate($request, [
            'statusAnswer' => 'required|max:100',

        ]);
        // On crée un nouvel utilisateur
        $answers->update([
            'statusAnswer' => $request->statusAnswer,

        ]);
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json([
            'status' => 'Mise à jour avec succés'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anwers  $anwers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answers $answers)
    {
        $answers->delete();
        // On retourne la réponse JSON
        return response()->json([
            'status' => 'Supprimer avec succès avec succés'
        ]);
    }
}
