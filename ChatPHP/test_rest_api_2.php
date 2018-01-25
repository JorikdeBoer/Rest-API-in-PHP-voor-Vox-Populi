<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
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
    elseif ($verb == 'PUT'){
        
            /* PUT data comes in on the stdin stream */
            $putdata = fopen("php://input", "r");
            parse_str(file_get_contents("php://input"),$post_vars);
            $mytextfile = fopen("mytextfile.txt", "a+") or die("Unable to open file!");
            // De oude chatmessages worden bewaard voor nieuwe file
            $old_content = file_get_contents($mytextfile);
            // De nieuwe content wordt uitgeschreven
            $new_content = "The username = " .$post_vars['username']. "\nThe message = " .$post_vars['message']. "\n";
            // Alles wordt teruggezet in de tekstfile
            fwrite($mytextfile, $new_content."\n".$old_content);
            fclose($mytextfile);
        
        //DE OUDE POST MANIER
        //if (isset( $_POST["username"] )){
            //echo "Username: " .$_POST["username"]. "\n";
            //echo "Message: " .$_POST["message"]. "\n";
            //$mytextfile = fopen("mytextfile.txt", "a+") or die("Unable to open file!");
            //$old_content = file_get_contents($mytextfile);
            //$new_content = "The username = " .$_POST["username"]. "\nThe message = " .$_POST["message"]. "\n";
            //echo $old_content;
            //echo $new_content;
            //fwrite($mytextfile, $new_content."\n".$old_content);
            //fclose($mytextfile);
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