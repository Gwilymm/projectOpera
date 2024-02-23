<?php

try {
    $client = new SoapClient("http://localhost/tresorService.wsdl");
    $result = $client->trouverTresor(['nomPirate' => 'Barbe Noire']);
    echo "Latitude: " . $result->latitude . "\n";
    echo "Longitude: " . $result->longitude . "\n";
} catch (SoapFault $fault) {
    echo "Erreur SOAP: " . $fault->faultcode . " - ";
}
