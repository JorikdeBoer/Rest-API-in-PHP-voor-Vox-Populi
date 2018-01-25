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
            
            $mydatafile = fopen("mydatafile.txt", "w") or die("Unable to open file!");
            $txt = "The users mykey = " .$_GET["mykey"]. "\n";
            fwrite($mydatafile, $txt);
            $txt = "\nThe minimum id = " .$_GET["minimumid"]. "\n";
            fwrite($mydatafile, $txt);
            fclose($mydatafile);
            $mytextfile=fopen("mytextfile.txt", "r") or die("Unable to open file!");
            echo fread($mytextfile,filesize("mytextfile.txt"));
            fclose($mytextfile);
        }
        // error wanneer "mykey" niet meegegeven wordt
        else {
            die("Error: the required parameters are missing.");    
        }
    }

    // code om met PUT een bericht te maken (met de parameter body, inclusief "id", "mykey" en "value")
    //WORK in PROGRESS
    elseif ($verb == 'POST'){
        
        //if (isset( $_POST["username"] )){
            echo "Username: " .$_POST["username"]. "\n";
            echo "Message: " .$_POST["message"]. "\n";
            $mytextfile = fopen("mytextfile.txt", "w") or die("Unable to open file!");
            $old_content = file_get_contents($mytextfile);
            $txt = "The username = " .$_POST["username"]. "\nThe message = " .$_POST["message"]. "\n";
            fwrite($mytextfile, $txt."\n".$oldcontent);
            fclose($mytextfile);
            //$myfile = fopen("newfile2.txt", "w") or die("Unable to open file!");
            //$txt = $_POST['value'];
            //fwrite($myfile, $txt);
            //fclose($myfile);          
    }
        
        // error wanneer "value" niet meegegeven wordt
        //else {
        //    die("Error: the required parameters are missing.");    
        //}
    //}
?>