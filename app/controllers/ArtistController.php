<?php

class ArtistController extends Controller
{
    // Afficher la liste des artistes
    public function index()
    {
        $artistModel = new Artist();
        $artists = $artistModel->getAllArtists(); // On récupère tous les artistes
        $this->view('artist/index', ['artists' => $artists]); // On passe les artistes à la vue
    }

    // Afficher un artiste spécifique
    public function show($id)
    {
        $artistModel = new Artist();
        $artist = $artistModel->getArtistById($id); // On récupère un artiste par son ID
        $this->view('artist/show', ['artist' => $artist]); // Passer les données de l'artiste à la vue
    }
}
