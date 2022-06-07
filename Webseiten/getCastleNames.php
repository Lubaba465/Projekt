 <?php
$term = $_GET['term'];
require_once("dao.php");
$allCastles = $dao->getAllCastles();
$hint = array();    
foreach($allCastles as $castle) {
    $pos = strpos($castle['name'], $term);
    if ($pos !== false) {
        array_push($hint, $castle['name']);    
    }
    
    
}
echo json_encode($hint);
?>
