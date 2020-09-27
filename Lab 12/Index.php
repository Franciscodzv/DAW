<?php
    session_start(); 
    include("main.html"); 

    if(isset($_POST["submit"]) && !empty($_POST["submit"]))
    {
        if(isset($_POST["fname"]) && !empty($_POST["fname"]) && isset($_POST["fname"]) && !empty($_POST["fname"]))
        {
            $_POST["fname"] = htmlspecialchars($_POST["fname"]);
            $_POST["lname"] = htmlspecialchars($_POST["lname"]); 

            $_SESSION['fname'] = $_POST["fname"]; 
            $_SESSION['lname'] = $_POST["lname"]; 

            echo "<h5>Tu nombre es: ".$_SESSION["fname"]." ".$_SESSION["lname"]."<br />"; 

            $target_dir = "uploads/"; //$target_dir = "uploads/" - specifies the directory where the file is going to be placed
            $target_file = $target_dir.basename($_FILES["FileToUpload"]["name"]); //$target_file specifies the path of the file to be uploaded
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //$imageFileType holds the file extension of the file (in lower case)

            //Check if image file is an actual image or a fake image

            if(isset($_POST["submit"]))
            {
                $check = getimagesize($_FILES["FileToUpload"]["tmp_name"]); 
                if($check !== false)
                {
                    echo "<br/>"."File is an image - ".$check["mime"]."."; 
                    $uploadOk=1; 
                }
                else
                {
                    echo "<br/><br/>"."File is not an image."; 
                    $uploadOk=0; 
                }

                //Check if file already exists
                if(file_exists($target_file))
                {
                    echo "<br/><br/>"."Sorry, this file already exists."; 
                    $uploadOk=0; 
                }

                //Check file size
                if($_FILES["FileToUpload"]["size"] > 500000)
                {
                    echo "<br/><br/>"."Sorry, your file cannot exceed 500KB"; 
                    $uploadOk=0; 
                }

                //Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif")
                {
                    echo "<br/><br/>"."Sorry, file must be JPG, JPEG, PNG or GIF."; 
                    $uploadOk=0; 
                }

                //Check if $uploadOk is set to 0 by an error
                if($uploadOk==0)
                {
                    echo "<br/><br/>"."Sorry, your file could not be uploaded."; 
                }
                //Check if there was no error and try to upload file
                else
                {
                    if(move_uploaded_file($_FILES["FileToUpload"]["tmp_name"],$target_file))
                    {
                        echo "<br/><br/>"."The file ".basename($_FILES["FileToUpload"]["name"])." has been uploaded."; 
                        $_SESSION["img"] = $target_file; 

                    }
                    else
                    {
                        echo "<br/><br/>"."Sorry there was an error uploading your file."; 
                    }
                } exit(); 

            }

        }
        else
        {
            echo "Please fill out all fields."; 
        }
    }


?>