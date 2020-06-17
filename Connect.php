    <!DOCTYPE html>
    <html>
        <head>
            <title>Connexion Buvettes</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="cours.css">
        </head>
        <body>
            <?php 
		$user = 'root'; 
		$pass = ''; 
		// Data Source Name 
		$dsn = 'mysql:host=localhost; dbname=buvettes'; 
		try{ //tentative de connexion : on crée un objet de la classe PDO 
		$dbh= new PDO($dsn, $user, $pass); 
		//S'il y a des erreurs de connexion, un objet PDOException est lancé. Vous pouvez attraper cette exception si vous voulez  gérer cette erreur 
	} catch (PDOException $e){ 
		print "Erreur ! :" . $e->getMessage() . "<br/>"; 
	die(); 
} ?>        
        </body>
    </html>