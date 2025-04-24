<?php
namespace App\Http\Controllers;

use Exception;


class DashboardController extends Controller
{
    public function index()
    {
        $port = env('TOAD_PORT');
        $serveur = env('TOAD_SERVER');
        $apiUrl = "http://".$serveur.$port."/toad/film/all";
       
        try {
            $response = file_get_contents($apiUrl);
       
            if ($response === false) {
                throw new Exception("Erreur lors de l'appel de l'API.");
            }
       
            $films = json_decode($response, true);
           
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Erreur de décodage JSON : " . json_last_error_msg());
            }       
        return view('dashboard', compact('films'));
    } catch (Exception $e) {
    }
}

}
