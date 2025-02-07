<?php

class Artist extends Personne
{
    protected $bio;
    protected $profile_picture;
    protected $followers_count;

    public function __construct()
    {
        parent::__construct();
        $this->table = "artist";
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function getProfilePicture()
    {
        return $this->profile_picture;
    }

    public function getFollowersCount()
    {
        return $this->followers_count;
    }

    public function getAllArtists()
    {
        $query = "SELECT * FROM personne 
                  JOIN artist ON personne.id = artist.id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un artiste par son ID
    public function getArtistById($id)
    {
        $query = "SELECT * FROM personne 
                  JOIN artist ON personne.id = artist.id 
                  WHERE personne.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateArtist($id, $bio, $profile_picture)
    {
        $stmt = $this->db->prepare("UPDATE artist SET bio = ?, profile_picture = ? WHERE id = ?");
        return $stmt->execute([$bio, $profile_picture, $id]);
    }
}
