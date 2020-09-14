<?php

use function PHPSTORM_META\elementType;

include("_header.html"); ?>



<?php

    $fname = ""; 
    $nameError = ""; 

    $lname = "";
    $lnameError = ""; 

    $phone = ""; 
    $phoneError = ""; 

    $zip = ""; 
    $zipError = ""; 

    $genderError = ""; 
    $gender = ""; 

    $city = ""; 
    $cityError = ""; 

    $country = ""; 
    $countryError = ""; 

    function clean($entrada)
    {
        return $entrada = htmlspecialchars($entrada); 
        
    }

    function cleanArr($entradas)
    {
        foreach($entradas as &$variable)
        {
            $variable = clean($variable); 
            
        }
        return $entradas;
    }

    
    $_POST=cleanArr($_POST);
    
    
    

    if(isset($_POST["fname"]) && !empty($_POST["fname"]))
    {
         
        $nameError=""; 
        if(!ctype_alpha($_POST["fname"]))
        {
            $nameError = "Your name cannot contain numbers or symbols."; 
        }    
        $fname = $_POST["fname"];
        
    }
    else
    {
        $nameError = "Please enter your first name.";
    }

    if(isset($_POST["lname"]) && !empty($_POST["lname"]))
    {
        $lnameError=""; 
        if(!ctype_alpha($_POST["lname"]))
        {
            $lnameError = "Your last name cannot contain numbers or symbols."; 
        }
        $lname = $_POST["lname"]; 
    }
    else
    {
        $lnameError = "Please enter your last name.";
    }

    if(isset($_POST["phone"]) && !empty($_POST["phone"]))
    {
        $phoneError= ""; 
        
        if(!ctype_alnum($_POST["phone"]))
        {
            $phoneError = "Your phone number can only contain numbers."; 
        }
        $numbers = strlen($_POST["phone"]); 
        if($numbers != 10)
        {
            $phoneError = "Please enter a valid phone number.";
        }

        $phone = $_POST["phone"]; 
    }
    else
    {
        $phoneError = "Please enter your phone number."; 
    }

    if(isset($_POST["zip"]) && !empty($_POST["zip"]))
    {
        $zipError = ""; 

        if(!ctype_alnum($_POST["zip"]))
        {
            $zipError = "Your Zip Code can only contain numbers."; 
        }
        
        $code = strlen($_POST["zip"]); 

        if($code != 5)
        {
            $zipError = "Please enter a valid Zip Code"; 
        }
        $zip = $_POST["zip"]; 
    }
    else
    {
        $zipError = "Please enter your Zip Code"; 
    }

    if(!isset($_POST["male"]) && !isset($_POST["female"]) && !isset($_POST["other"]))
    {
        $genderError = "Please select your gender.";
    }
    else if(isset($_POST["male"]) && isset($_POST["female"]) && isset($_POST["other"]))
    {
        $genderError = "Please only select one gender.";
    }
    else if(isset($_POST["male"]) && isset($_POST["female"]))
    {
        $genderError = "Please only select one gender.";
    }
    else if(isset($_POST["male"]) && isset($_POST["other"]))
    {
        $genderError = "Please only select one gender.";
    }
    else if(isset($_POST["female"]) && isset($_POST["other"]))
    {
        $genderError = "Please only select one gender.";
    }
    else if(isset($_POST["male"]) && !isset($_POST["female"]) && !isset($_POST["other"]))
    {
        $gender = "Male"; 
    }
    else if(!isset($_POST["male"]) && isset($_POST["female"]) && !isset($_POST["other"]))
    {
        $gender = "Female"; 
    }
    else if(!isset($_POST["male"]) && !isset($_POST["female"]) && isset($_POST["other"]))
    {
        $gender = "Other"; 
    }

    if(isset($_POST["city"]) && !empty($_POST["city"]))
    {
        $cityError = ""; 

        if(!ctype_alpha($_POST["city"]))
        {
            $cityError = "The City's name cannot contain numbers or symbols."; 
        }
        $city = $_POST["city"];
    }
    else
    {
        $cityError = "Please enter your city of residence.";
    }

    if(isset($_POST["country"]) && !empty($_POST["country"]))
    {

        $countryError = ""; 
        $country = $_POST["country"];

        
    }
    else
    {
        $countryError = "Please select your country of residence.";
    }


    






     
    
    

    

    
?>
<?php include("_forms.html"); ?>

<?php include("_footer.html"); ?>