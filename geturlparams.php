<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 


/*
Function get all URL's attribute names and values.
*/
function get_all_attributes(){
    
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    // You can add ur url what u wanna track to $url variable.
    //$url = "";

    echo "<b><h1>Shows all attributes which contains in array.</h1></b>";
    echo  "<b>Example URL: </b>" . "$url <br> <br>";      

    //Lets see if $url attribute got some value.
    // $check variable for checking if url got some attributes after "?"
    $check = "?";
        
    if(strpos($url, $check) !== false){
        $queryString = parse_url($url);
        $queryString = $queryString['query'];
        $parameters = array();
        parse_str($queryString, $parameters);

        echo "<b>Inside array:</b> ";
        print_r($parameters);
    }else{
      echo "Nothing found";
       die(); 
    } 


    //Search attribute name and its value.
    foreach ($parameters as $key => $value) {
        echo "<br><br> attribute name = " . $key . ", value = " . $value . "<br>";
    }
}

//If you wanna call method -> get_all_attributes();


/*
Function get all URL's attribute names and values.
Looping/searching specific attribute and its value from array.
When you call this function, you need to define attribute name to $attribute and value to $mvalue.
*/
$attribute = "auth";
$mvalue = "off";

function get_attribute($attribute, $mvalue){

    // You can add ur url what u wanna track to $url variable.
    //$url = "";
  
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "<b><h1>Shows only specific attribute and its value. <br>Function takes 2 parameters which are attribute and value.</h1></b>";
    echo  "<b>Example URL: </b>" . "$url <br> <br>";      

    //Lets see if $url attribute got some value.
    // $check variable for checking if url got some attributes after "?"
    $check = "?";
        
    if(strpos($url, $check) !== false){
        $queryString = parse_url($url);
        $queryString = $queryString['query'];
        $parameters = array();
        parse_str($queryString, $parameters);

        echo "<b>Inside array:</b> ";
        print_r($parameters);
    }else{
        echo "Nothing found.";
        die(); 
        } 

    //Search attribute name and its value from array.
    foreach ($parameters as $key => $value) {
        echo "<br><br> attribute name = " . $key . ", value = " . $value . "<br>";
    if ($key == $attribute && $value == $mvalue){
        echo "Found it, do something..";
    }else{
        echo "Cannot found in context, do something..";
    } 
  }
}

//If you wanna call method -> get_attribute($attribute, $mvalue);
?> 
</body>
</html>