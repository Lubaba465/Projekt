<?php 

$commentar1= array(
    "author" => "James Bond",
    "text" => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At",
    "time" => "07.07.2027 07:07"
);

$commentar2= array(
    "author" => "Bruce Wayne",
    "text" => "Mein Haus ist geiler",
    "time" => "08.07.2017 17:09"
);
        
$castle1 = array(
    "id" => "858wf38rkjir",
    "name" => "Schloss Neustein",
    "city" =>"Hamburg",
    "year" => 1600,
    "style" => "Romanik",
    "public" => "Ja",
    "link" => "https://wikipedia.de",
    "description" => "Das ist Schloss Neustein",
    "autor" =>"Joe Doe",
    "autor_email" => "joedoe@example.com",
    "changedate" => "14.05.2019, 12:00",
    "country" => "Deutschland",
    "comments" =>array($commentar1, $commentar2),
    "pictures" => array("./bilder/neuenstein0.jpg", "./bilder/unknown.png"),
    "century" => "17. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein!",
    "firstletter" => "N"
);
    
$castle2= array(
    "id" => "jnse8483uhr8jr84bk5et",
    "name" => "Schloss Kilkenny",
    "city" => "England",
    "year" => 1700,
    "style" => "Historismus",
    "public" => "Ja",
    "link" => "https://wikipedia.de",
    "description" => "Das ist Schloss Kilkenny.",
    "autor" => "John Martins",
    "autor_email" => "johnmartins@example.com",
    "changedate" => "15.05.2019, 10:00",
    "country" => "England",
    "comments" => array($commentar1, $commentar2),
    "pictures" => array("./bilder/kilkenny1.jpg"),
    "century" => "18. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein!",
    "firstletter" => "K"
);

$castle3 = array(
    "id" => "546dfsgsz56drjxe4t",
    "name" => "Burg Adendorf", 
    "city" => "Oldenburg", 
    "year" => 576,
    "style" => "Klassik",
    "public" => "Nein",
    "link" => "https://www.example.com",
    "description" => "Eine Burg",
    "autor" => "Jon Doe",
    "autor_email" => "joedoe@example.com",
    "changedate" => "21.09.2018 21:08",
    "country" => "Deutschland", 
    "comments" => array($commentar1),
    "pictures" => array("./bilder/Burg_Adendorf.jpg"), 
    "century" => "06. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein",
    "firstletter" => "A"
     
   
);
$castle4 = array(
    "id" => "fdhf6d5e4w3",
    "name" => "Burg Kreuzenstein", 
    "city" => "Hannover", 
    "year" => 1459,
    "style" => "Romantik",
    "public" => "Ja",
    "link" => "https://www.example.com",
    "description" => "Hier steht etwas",
    "autor" => "Jon Doe",
    "autor_email" => "joedoe@example.com",
    "changedate" => "10.04.2017 05:39",
    "country" => "Deutschland", 
    "comments" => array(),
    "pictures" => array("./bilder/Burg_Kreuzenstein.jpg"),
    "century" => "15. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein",
    "firstletter" => "K"
);
$castle5 = array(
    "id" => "3wa4es5rd6uti78",
    "name" => "Burg Hohenzollern", 
    "city" => "Wien", 
    "year" => 967,
    "style" => "Gotik",
    "public" => "Nein",
    "link" => "https://www.example.com",
    "description" => "Hier steht etwas",
    "autor" => "John Martins",
    "autor_email" => "johnmartins@example.com",
    "changedate" => "31.01.1999 03:59",
    "country" => "Österreich",
    "comments" => array(),
    "pictures" => array("./bilder/Burg_Hohenzollern_ak.jpg"),
    "century" => "10. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein",
    "firstletter" => "H" 
);
$castle6 = array(
    "id" => "9l8gzk7ft6fx5d4",
    "name" => "Burg Kriebstein", 
    "city" => "London", 
    "year" => 1128,
    "style" => "Klassik",
    "public" => "Nein",
    "link" => "https://www.example.com",
    "description" => "Hier steht etwas",
    "autor" => "John Martins",
    "autor_email" => "johnmartins@example.com",
    "changedate" => "15.12.2010 10:36",
    "country" => "England", 
    "comments" => array($commentar1, $commentar2),
    "pictures" => array("./bilder/kriebstein0.jpg", "./bilder/kriebstein1.jpg", "./bilder/Burg_Kriebstein.jpg"), 
    "century" => "12. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein",
    "firstletter" => "K" 
);

$castle7 = array(
    "id" => "ndt6h5se44", 
    "name" => "Burg Neuschwanstein", 
    "city" => "Stockholm",
    "year" => 687,
    "style" => "Modern",
    "public" => "Ja",
    "link" => "https://www.example.com",
    "description" => "Hier steht etwas",
    "autor" => "John Martins",
    "autor_email" => "johnmartins@example.com",
    "changedate" => "07.09.2019 07:28",
    "country" => "Schweden", 
    "comments" => array($commentar1, $commentar2),
    "pictures" => array("./bilder/neuschwanstein.jpg", "./bilder/neuschwanstein/neuschw1.jpg", 
                        "./bilder/neuschwanstein/neuschw2.jpg", "./bilder/neuschwanstein/neuschw3.jpg", "./bilder/neuschwanstein/neuschw4.jpg"),
    "century" => "07. Jahrhundert",
    "coordinates" => "Hier sollte der Standort sein",
    "firstletter" => "N"  
);

$user1= array(
    "name" => "Joe Doe",
    "firstname" => "Joe",
    "lastname" => "Doe",
    "picture" => "./bilder/unknown.png",
    "email" => "joedoe@example.com",
    "password" => password_hash("12345", PASSWORD_DEFAULT),
    "description" => "Das ist meine Profilseite!"
);
    
$user2= array(
    "name" => "John Martins",
    "firstname" => "John",
    "lastname" => "Martins",
    "picture" => "./bilder/unknown.png",
    "email" => "johnmartins@example.com",
    "password" => "09sdlf0u43508394dsjfsdjlfsdfit9i30443332",
    "description" => "Das ist meine Profilseite!"
);
    
$allCastles = array(
    1 => $castle1, 
    2 => $castle2, 
    3 => $castle3, 
    4 => $castle4, 
    5 => $castle5, 
    6 => $castle6, 
    7 => $castle7);
$allUsers = array($user1, $user2);

class fileDAO implements DAO {
    function getUser($id) {
        
    }
    function getUserByMail($email) {
        global $allUsers;
            foreach($allUsers as $user) {
                if($email == $user["email"]) {
                    return $user;
                }
            }
        return "not found";
    }
    function getCastle($id){
        global $allCastles;
            foreach($allCastles as $castle) {
                if ($id == $castle["id"]) {
                    return $castle;
                }
            }
        return "not found";
    }
    function getAllCastles(){
         global $allCastles;
        return $allCastles;
    }
    function getFiveNewestCastles(){
        global $allCastles;
        return array_slice($allCastles, 1, 5);
    }
    function searchCastle($name){
        global $allCastles;
        $searchResults = array();
        foreach($allCastles as $castle) {
            if (strpos($castle["name"], $name) !== FALSE) {
                $searchResults[] = $castle;
            }
        }
        return $searchResults;
    }
    function getRandomCastle(){
        global $allCastles;
        $randomInt = rand(1, count($allCastles));
        return $allCastles[$randomInt];
        
    }
    function saveCastle($castle){
        
    }
    function updateCastle($id, $data){
        
    }
    function deleteCastle($id){
        
    }
    function saveUser($user){
        
    }
    function updateUser($id, $data){
        
    }
    function saveComment($comment) {
    
    }
    function savePicture($picture){
        
    }
    function deletePicture($id){
        
    }
    function getComments($id){
        global $allCastles;
        $castleComments = array();
        foreach($allCastles as $castle) {
            if ($id == $castle["id"]) {
                $castleComments[] = $castle["commentars"];
            }
        }
        return $castleComments;
    }
}

?>
