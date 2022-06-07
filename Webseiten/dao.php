<?php
interface DAO {
    function getUser($id);
    function getUserByUsername($email);
    function getUsernames();
    function getCastlesByUser($id);
    function getCastle($id);
    function getAllCastles();
    function getFiveNewestCastles();
    function searchCastle($name);
    function getRandomCastle();
    function getPicturesOfCastle($castle_id);
    function saveCastle($castle);
    function updateCastle($id, $data);
    function deleteCastle($id);
    function saveUser($user);
    function updateUserName($id, $username);
    function updateUserPassword($id, $password);
    function updateUserDescription($id, $description);
    function saveComment($comment);
    function savePicture($picture);
    function deletePicture($id);
    function getComments($castle_id);
    function deleteUser($id);
}
//include("hardcode_dao.php");
include("database_dao.php");

$dao = new databaseDAO;
?>
