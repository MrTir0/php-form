?php

try{
$db = new PDO('mysql:host = localhost;dbname=test','root','root');
} catch (PDOException $e){
    echo $e ->getMessage();
}
 
?
