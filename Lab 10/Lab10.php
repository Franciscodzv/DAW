<?php include("_header.html"); ?>



<?php

    $nameError = ""; 
    $fname = ""; 
    $lnameError = ""; 
    $phoneError = ""; 

    function clean($entrada)
    {
        return $entrada = htmlspecialchars($entrada); 
        
    }

    function cleanArr($entradas)
    {
        foreach($entradas as &$variable)
        {
            $variable = clean($variable); 
            echo $variable;
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
    }
    else
    {
        $lnameError = "Please enter your last name.";
    }

    if()
    {
        
    }
    

    

    
?>
<?php include("_forms.html"); ?>

<?php include("_footer.html"); ?>