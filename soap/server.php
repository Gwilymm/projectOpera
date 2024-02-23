<?php

function trouverTresor($request)
{
    // Un tableau associatif de pirates et de leurs trésors (latitude et longitude)
    $tresors = [
        "Barbe Noire" => ["latitude" => "35.6895", "longitude" => "139.6917"], // Coordonnées de Tokyo
        "Jack Sparrow" => ["latitude" => "28.6139", "longitude" => "77.2090"], // Coordonnées de New Delhi
        "Anne Bonny" => ["latitude" => "53.3498", "longitude" => "-6.2603"], // Coordonnées de Dublin
        "Edward Teach" => ["latitude" => "-33.8688", "longitude" => "151.2093"], // Coordonnées de Sydney
        "Calico Jack" => ["latitude" => "25.0343", "longitude" => "-77.3963"] // Coordonnées de Nassau
    ];

    // Récupère le nom du pirate à partir de la requête
    $nomPirate = $request->nomPirate;

    // Vérifie si le nom du pirate existe dans le tableau des trésors
    if (array_key_exists($nomPirate, $tresors)) {
        return $tresors[$nomPirate];
    } else {
        // Si le pirate n'est pas trouvé, retourne un message d'erreur ou des coordonnées nulles
        return ["latitude" => "0", "longitude" => "0", "message" => "Pirate non trouvé"];
    }
}

// Crée un serveur SOAP en utilisant le fichier WSDL pour définir le service
$server = new SoapServer("tresorService.wsdl");

// Ajoute la fonction 'trouverTresor' au serveur SOAP
$server->addFunction("trouverTresor");

// Lance le gestionnaire du serveur pour traiter les requêtes
$server->handle();
