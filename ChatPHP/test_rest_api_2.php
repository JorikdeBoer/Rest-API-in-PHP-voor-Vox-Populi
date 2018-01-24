<?php
    header("Access-Control-Allow-Origin: *");
    $verb = $_SERVER['REQUEST_METHOD'];

    // code om met GET (nieuwe) berichten te krijgen (met de parameters "minimumid" & mykey") 
    if ($verb == 'GET'){
        
        // controle om te checken of de input "mykey" bestaat
        if (isset( $_GET["mykey"] )){
            //|| $_GET["minimumid"]
            echo "The users mykey = " .$_GET["mykey"]. "\n";
            echo "The minimum id = " .$_GET["minimumid"]. "\n";
            
            $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            $txt = "The users mykey = " .$_GET["mykey"]. "\n";
            fwrite($myfile, $txt);
            $txt = "\nThe minimum id = " .$_GET["minimumid"]. "\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        }
        // error wanneer "mykey" niet meegegeven wordt
        else {
            die("Error: the required parameters are missing.");    
        }
    }

    // code om met PUT een bericht te maken (met de parameter body, inclusief "id", "mykey" en "value")
    //WORK in PROGRESS
    elseif ($verb == 'POST'){
        
        if (isset( $_POST["value"] )){
            echo "Value: " .$_POST["value"]. "\n";
            
            $myfile = fopen("newfile2.txt", "w") or die("Unable to open file!");
            $txt = $_POST['value'];
            fwrite($myfile, $txt);
            fclose($myfile);          
        }
        
        // error wanneer "value" niet meegegeven wordt
        else {
            die("Error: the required parameters are missing.");    
        }
    }
?>