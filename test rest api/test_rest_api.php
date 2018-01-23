<?php
    $verb = $_SERVER['REQUEST_METHOD'];

    // code om met POST een bericht in de database te zetten (vermoedelijk met de tekst "mykey" & "value" 
    if ($verb == 'GET'){
        
        if (isset( $_GET['filename'])){
            $file_content = file_get_contents($_GET['filename']);
            echo $file_content;
        }
        else {
            die("Error: the required parameters are missing.");    
        }
    }

    // code om met GET een bericht ui de database te krijgen (vermoedelijk met de tekst "mykey" & id") 
    elseif ($verb == 'POST'){
        
    }
?>

