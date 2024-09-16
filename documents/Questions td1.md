Question 1:

- La méthode HTTP `GET` demande une représentation de la ressource spécifiée. Les requêtes utilisant `GET` ne doivent être utilisées que pour demander des données et ne doivent pas inclure de contenu.

- La méthode HTTP `POST` envoie des données au serveur. Une requête `POST` est généralement envoyée via un formulaire HTML et entraîne une modification sur le serveur.

Question 2:

|                       | `GET` | `POST` |
|----|:---:|:---:|
| La requête a un corps |  NON  |  OUI   |
| Une réponse réussie a du corps | OUI | OUI |
| Sûr |  OUI  |  NON   |
| Idempotent | OUI | NON |
| Peut être mis en cache |  OUI  |  Seulement si une information de péremption est incluse   |
| Autorisé dans les formulaires HTML | OUI | OUI |


Question 3:

- HTTP est un protocole extensible qui a évolué au cours du temps. À partir de HTTP/1.0, les en-têtes HTTP permettent d'étendre facilement le protocole et de mener des expérimentations avec celui-ci. C'est un protocole de la couche application dont les données transitent via TCP ou à travers une connexion TCP chiffrée avec TLS. En raison de son extensibilité, il n'est pas seulement utilisé pour récupérer des documents, mais aussi pour des images, des vidéos ou bien pour renvoyer des contenus vers des serveurs, comme des résultats de formulaires HTML. HTTP peut aussi être utilisé pour récupérer des parties de documents pour mettre à jour à la demande des pages web.


Question 4:

- HTTP est un protocole sans état , ce qui signifie que le serveur ne conserve aucune donnée (état) entre deux requêtes.

  Les protocoles sans état améliorent les propriétés de visibilité, de fiabilité et d'évolutivité. La visibilité est améliorée car un système de surveillance n'a pas besoin de regarder au-delà d'une seule requête pour déterminer sa nature complète. La fiabilité est améliorée car elle facilite la tâche de récupération après des pannes partielles. L'évolutivité est améliorée car le fait de ne pas avoir à stocker l'état de session entre les requêtes permet au serveur de libérer rapidement des ressources et simplifie encore davantage la mise en œuvre.

  L’inconvénient des protocoles sans état est qu’ils peuvent diminuer les performances du réseau en augmentant les données répétitives envoyées dans une série de requêtes, car ces données ne peuvent pas être laissées sur le serveur et réutilisées.

Question 5:

- Les URL de données sont composées de quatre parties : un préfixe ( data:), un type MIME indiquant le type de données, un base64jeton facultatif s'il n'est pas textuel et les données elles-mêmes :
      `data:[<mediatype>][;base64],<data>`

  Le `mediatype` est d'une chaîne de type MIME , comme `'image/jpeg'` pour un fichier image JPEG. Si elle est omise, la valeur par défaut est `text/plain;charset=US-ASCII`.

  Si les données contiennent des caractères définis dans la RFC 3986 comme caractères réservés , ou contiennent des caractères d'espacement, des caractères de nouvelle ligne ou d'autres caractères non imprimables, ces caractères doivent être codés en pourcentage .

  Si les données sont textuelles, on peut incorporer le texte (en utilisant les entités ou les échappements appropriés en fonction du type du document englobant). Sinon, on peut  spécifier `base64` d'incorporer des données binaires codées en base64.

Question 6:

Les codes d'état de réponse HTTP indiquent si une requête HTTP spécifique a été exécutée avec succès. Les réponses sont regroupées en cinq classes :

- Réponses informatives (100 – 199)  
  exemple: `100` Continue 
  > Cette réponse intermédiaire indique que le client doit poursuivre la demande ou ignorer la réponse si la demande est déjà terminée.
- Réponses réussies (200 – 299)  
  exemple: `201` Created
  > La requête a réussi et une nouvelle ressource a été créée en conséquence. Il s'agit généralement de la réponse envoyée après `POST` des requêtes ou certaines `PUT` requêtes.
- Messages de redirection (300 – 399)  
  exemple: `301` Moved Permanently
  > L'URL de la ressource demandée a été modifiée de manière permanente. La nouvelle URL est indiquée dans la réponse.
- Réponses d’erreur du client (400 – 499)  
  exemple: `404` Not Found
  > Le serveur ne trouve pas la ressource demandée. Dans le navigateur, cela signifie que l'URL n'est pas reconnue. Dans une API, cela peut également signifier que le point de terminaison est valide mais que la ressource elle-même n'existe pas. Les serveurs peuvent également envoyer cette réponse au lieu de 403 Forbidden pour masquer l'existence d'une ressource à un client non autorisé. Ce code de réponse est probablement le plus connu en raison de son apparition fréquente sur le Web.
- Réponses d'erreur du serveur (500 – 599)  
  exemple: `504` Gateway Timeout
  > Cette réponse d'erreur est donnée lorsque le serveur agit comme une passerelle et ne peut pas obtenir de réponse à temps.

Question 7:

- En HTTP, la négociation de contenu est le mécanisme utilisé pour servir différentes représentations d'une ressource à partir du même URI pour aider l'agent utilisateur à indiquer la représentation la plus adaptée à l'utilisatrice ou à l'utilisateur (par exemple, la langue du document, le format d'image ou l'encodage à utiliser pour le contenu).

**Les principes de la négociation de contenu**
- Un document donné est défini comme une ressource. Lorsqu'un client souhaite obtenir une ressource, il la demande via une URL. Le serveur utilise alors cette URL pour choisir l'une des variantes disponibles. Chaque variante est appelée une représentation. Le serveur renvoie alors une représentation donnée au client. La ressource, ainsi que chacune de ses représentations, dispose d'une URL spécifique. La négociation de contenu détermine quelle représentation donnée est utilisée lorsque la ressource est demandée. Il existe plusieurs méthodes de négociation entre le client et le serveur.

![](https://developer.mozilla.org/fr/docs/Web/HTTP/Content_negotiation/httpnego.png)

La représentation la plus adaptée est choisie selon l'un de ces deux mécanismes :

- Des en-têtes HTTP spécifiques envoyés par le client (négociation menée par le serveur ou négociation proactive) : il s'agit de la méthode standard pour négocier un type de ressource donné.
- Les codes de réponse HTTP `300 Multiple Choices`, `406 Not Acceptable` ou `415 Unsupported Media Type` envoyés par le serveur (négociation menée par l'agent ou négociation réactive), sont utilisés comme mécanismes de recours.

Question 10:

**Request Header**

|Champ d'en-tête| Signification | Exemple |
|----|:---:|:---:|
|Accept|Les types de contenu que le client peut traiter ; si le champ est vide, il s’agit de tous les types de contenu|Accept: text/html, application/xml|
|Accept-Charset|Quels jeux de caractères le client peut afficher|Accept-Charset: utf-8|
|Accept-Encoding|Les formats compressés pris en charge par le client|Accept-Encoding: gzip|
|Accept-Language|Version linguistique souhaitée|Accept-Language: fr-FR|
|Authorization|Données d’authentification (par exemple pour un login)|Basic WjbU7D25zTAlV2tZ7==|
|Cache-Control|Options du mécanisme de mise en cache|Cache-Control: no-cache|
|Cookie|Cookie stocké pour ce serveur|Cookie: $Version=1; Content=23|
|Content-Length|Longueur de l’organisme demandeur|Content-Length: 212|
|Content-Type|Type MIME ; pertinent pour les requêtes POST et PUT|Content-Type: application/x_222-form-urlencoded|
|Date|Date et heure de la demande|Date: Mon, 9 March 2020 09:02:22 GMT|
|Expect|	Formule une attente au serveur, généralement la réception d’une demande importante|Expect: 100-continue (le serveur doit envoyer le code 100 lorsqu’il est prêt à recevoir la requête)|
|Host|Nom de domaine du serveur|Host: exemple.fr|
|If-Match|	Exécution conditionnelle d’une action, en fonction de la concordance d’un code transmis|If-Match: „ft678iujhnjio90’pöl“|
|If-Modified-Since|Envoyer uniquement si le contenu demandé a été modifié depuis le moment spécifié|IF-Modified-Since: Mon 2 Mar 2020 1:00:00 GMT|
|If-None-Match|Comme ci-dessus, mais spécifié via un ETag (Entity-Tag = tag d’entité, voir ci-dessous)|If-None-Match: „cxdrt5678iujhgbvb“|
|If-Range|Ne demande que la partie du contenu qui a été modifiée ou qui manque dans le cache du client|If-Range: Mon 2 Mar 2020 1:00:00 GMT|
|If-Unmodified-Since|Analogue à IF-Modified-Since|If-Modified-Since: Mon 2 Mar 2020 1:00:00 GMT|
|Max-Forwards|Définit le nombre maximum de fois que la réponse du serveur peut être transmise|Max-Forwards: 12|
|Proxy-Authorization|Utilisé pour authentifier le client auprès d’un serveur proxy|Proxy-Authorization: Basic WjbU7D25zTAlV2tZ7==|
|Range|Précise une partie du contenu demandé|Range: bytes=0-9999|
|Referrer|URL de la ressource à partir de laquelle la demande est faite (c’est-à-dire à partir de laquelle le lien a été créé)|Referrer: https://exemple.fr/index.html|
|TE|Codage de transfert d’extension accepté|TE: gzip, deflate|
|User-Agent|User-Agent du client (simplement dit : le navigateur)|Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36|

**Response Header**

|Champ d'en-tête| Signification | Exemple |
|----|:---:|:---:|
|Accept-Ranges|Unités que le serveur accepte pour les spécifications de la plage (voir ci-dessus)|Accept-Ranges: bytes|
|Age|Nombre de secondes pendant lesquelles l’objet a été dans la mémoire cache|Age: 2300|
|Allow|Types de demandes autorisées pour une ressource spécifique|Allow: GET, POST, HEAD|
|Cache-Control|Si l’objet peut être conservé dans le cache et pendant combien de temps|Cache-Control: max-age=4800|
|Connection|Type de connexion préféré|Connection: close|
|Content-Encoding|Type de compression|Content-Encoding: deflate|
|Content-Language|Langue de la ressource|Content-Language: fr-FR|
|Content-Length|Taille du corps en octets|Content-Length: 135674|
|Content-Location|Emplacement du fichier s’il provient d’un endroit différent de celui demandé (par exemple CDN)|Content-Location: /exemple.fr|
|Content-Security-Policy|Concepts de sécurité du serveur|Content-Security-Policy: frame-src ‘none’; object-src ‘none’|
|Content-Type|Type MIME du dossier demandé|Content-Type: text/tml; charset=utf-8|
|Date|Délai de réponse|Date: Mon 2 Mar 2020 1:00:00 GMT|
|ETag|Marque une version spécifique du fichier|ETag: „vt6789oi8uztgfvbn“|
|Expires|Quand le dossier doit être considéré comme obsolète|Expires: Tue 3 Mar 2020 1:00:00 GMT|
|Last-Modified|Date de la dernière modification du dossier|Last-Modified: Mon 2 Mar 2020 1:00:00 GMT|
|Location|Identifie le lieu où la demande a été transmise|Location: https://www.exemple.fr|
|Proxy-Authenticate|Indique si et comment le client doit s’authentifier auprès du proxy|Proxy-Authenticate: Basic|
|Retry-After|A partir de quand le client doit faire une nouvelle demande si la ressource est temporairement indisponible (date ou secondes)|Retry-After: 300|
|Server|Identification du serveur|Server: Apache|
|Set-Cookie|Installe un cookie chez le client|	Set-Cookie: UserID=XY; Max-Age=3800; Version=1|
|Transfer-Encoding|Méthode de compression|Transfer-Encoding: gpzip|
|Vary|Indique quels champs d’en-tête doivent être considérés comme variables si un fichier est demandé dans le cache|Vary: User-Agent (= le serveur contient différentes versions de fichiers selon l’User Agent)|
|Via|Via quels proxies la réponse a été envoyée|Via : 1.1www.exemple.fr|

