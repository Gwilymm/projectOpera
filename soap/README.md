# Guide d'utilisation du Service Web SOAP pour la Localisation des Trésors des Pirates
Ce guide vous aidera à configurer et à utiliser le service web SOAP
 pour localiser les trésors cachés par les pirates. 
 Ce service est développé en PHP et repose sur une architecture SOAP 
 sans l'utilisation de frameworks. 
 Le service permet, à partir du nom d'un pirate, 
 de retourner les coordonnées (latitude et longitude) du trésor caché.

## Prérequis
PHP avec l'extension SOAP installée et activée.
Serveur web comme Apache configuré et en cours d'exécution.
Client SOAP pour tester le service (Postman ou un script client PHP est recommandé).
Installation

Clonez ou téléchargez le projet dans le répertoire de votre serveur web local.

Placez les fichiers dans un répertoire accessible par votre serveur web. Par exemple, dans le répertoire www ou htdocs selon votre configuration de serveur.

Assurez-vous que le serveur web et PHP sont configurés et en cours d'exécution. Vérifiez que l'extension SOAP est activée dans votre configuration PHP (php.ini).

## Structure des fichiers
tresorService.wsdl : Le fichier WSDL décrivant les opérations disponibles du service web.
server.php : Le script PHP implémentant la logique du service web.
client.php : Un exemple de script client PHP pour consommer le service.

## Démarrage du Serveur SOAP

Ouvrez le terminal ou l'invite de commandes.
Naviguez vers le répertoire de votre projet.
    docker-compose up --build

## Utilisation du Service

Via Postman (ou un autre outil de test SOAP)
Ouvrez Postman et créez une nouvelle requête POST.
Configurez l'URL pour pointer sur http://localhost:8080/client.php 

Configurez le body en xml

```xml
	<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                  xmlns:tns="http://localhost:8080/tresorService">
    	<soapenv:Header/>
    		<soapenv:Body>
        		<tns:trouverTresorRequest>
            		<tns:nomPirate>Barbe Noire</tns:nomPirate>
        		</tns:trouverTresorRequest>
    		</soapenv:Body>
	</soapenv:Envelope>
```	

Vous pouvez changer le nom du pirate entre :
"Barbe Noire"
"Jack Sparrow"
"Anne Bonny"
"Edward Teach" 
"Calico Jack"



Contribution
Les contributions à ce projet sont les bienvenues. Pour proposer des améliorations ou des corrections, veuillez ouvrir une issue ou soumettre une pull request.

Sauras tu découvrir ou mènes ces coordonnées ????