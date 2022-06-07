<?php
class databaseDAO implements DAO {
    private $db = null;
    private $statementUserById = null;
    private $statementUserByUsername = null;
    private $statementCastle = null;
    private $statementCastleByName = null;
    private $statementPictures = null;
    private $statementAllCastles = null;
    private $statementAllCastlesByDate = null;
    private $statementSearch = null;
    private $statementSaveCastle = null;
    private $statementSaveUser = null;
    private $statementSaveComment = null;
    private $statementComments = null;
    private $statementUpdateCastle = null;
    private $statementDeleteCastle = null;
    private $statementUpdateUserName = null;
    private $statementUpdateUserPassword = null;
    private $statementUpdateUserDescription = null;
    private $statementSavePicture = null;
    private $statementDeletePicture = null;
    private $statementGetToDeletePicture = null;
    private $statementDeleteUser = null;
    
    private function statementSetup() {
        
        $this->statementUserById = $this->db->prepare("SELECT * FROM users WHERE id = :id;");
        
        $this->statementUserByUsername = $this->db->prepare("SELECT * FROM users WHERE username = :username;");
        
        $this->statementUsernames = $this->db->prepare("SELECT username FROM users;");
        
        $this->statementCastlesByUserId = $this->db->prepare("SELECT * FROM castles WHERE author_id = :id;");
        
        $this->statementCastle = $this->db->prepare("SELECT * FROM castles WHERE id = :id;");
        
        $this->statementCastleByName = $this->db->prepare("SELECT * FROM castles WHERE name = :name");
        
        $this->statementPictures = $this->db->prepare("SELECT * FROM pictures WHERE castle_id = :castle_id;");
        
        $this->statementComments = $this->db->prepare("SELECT * FROM comments WHERE castle_id = :castle_id;");
        
        $this->statementAllCastles = $this->db->prepare("SELECT * FROM castles;");
        
        $this->statementAllCastlesByDate = $this->db->prepare("SELECT * FROM castles ORDER BY creation_date DESC;");
        
        $this->statementSearch = $this->db->prepare("SELECT * FROM castles WHERE name LIKE '%' || :searchname || '%';");
        
        $this->statementSaveCastle = $this->db->prepare("INSERT INTO castles (name, city, country, year, century, style, public, link, description, author_id, change_date, creation_date, firstletter, longitude, latitude) VALUES (:name, :city, :country, :year, :century, :style, :public, :link, :description, :author_id, :change_date, :creation_date, :firstletter, :longitude, :latitude);");
        
        $this->statementSaveUser = $this->db->prepare("INSERT INTO users (username, password, picturepath, description, question, answer) VALUES (:username, :password, './bilder/unknown.png', ' ', :question, :answer);");
        
        $this->statementSaveComment = $this->db->prepare("INSERT INTO comments (castle_id, author, time, content) VALUES (:castle_id, :author, :time, :content);");
        
        $this->statementUpdateCastle = $this->db->prepare("UPDATE castles SET name = (:name), city = (:city), country = (:country), year = (:year), century = (:century), style = (:style), public = (:public), link = (:link), description = (:description), author_id = (:author_id), change_date = (:change_date), firstletter = (:firstletter), longitude = (:longitude), latitude = :latitude WHERE id = (:id);");
        
        $this->statementDeleteCastle = $this->db->prepare("DELETE FROM castles WHERE id = :id; DELETE FROM pictures WHERE castle_id = :id; DELETE FROM comments WHERE castle_id = :id;");
        
        $this->statementUpdateUserName = $this->db->prepare("UPDATE users SET username = :username WHERE id = :id;");
        
        $this->statementUpdateUserPassword = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id;");
        
        $this->statementUpdateUserDescription = $this->db->prepare("UPDATE users SET description = :description WHERE id = :id;");
        
        $this->statementSavePicture = $this->db->prepare("INSERT INTO pictures (castle_id, path) VALUES (:castle_id, :path);");
        
        $this->statementDeletePicture = $this->db->prepare("DELETE FROM pictures WHERE id = :id;");
        
        $this->statementGetToDeletePicture = $this->db->prepare("SELECT path FROM pictures WHERE id = :id");
        
        $this->statementDeleteUser = $this->db->prepare("DELETE FROM users WHERE id = :id; DELETE FROM securityquestions WHERE user_id = :id;");
    }
    private function startConnection() {
        $user = "root";
        $pw = null;
        //$dsn = "mysql:dbname=PHP-PDO;host=localhost";
        $dsn= "sqlite:../Datenbank/datenbank.db";
        $this->db = new PDO($dsn, $user, $pw);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->statementSetup();
    }
    function getUser($id) {
        $this->startConnection();
        try {
            $this->statementUserById->bindValue(":id", $id);
            $this->statementUserById->execute();
            if($user = $this->statementUserById->fetch(PDO::FETCH_ASSOC)) {
                return $user;
            } else {
                return "not found";
            }
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E001");
        } finally {
            $this->db = null;
        }
    }
    function getUserByUsername($username) {
        $this->startConnection();
        try {
            $this->statementUserByUsername->bindValue(":username", $username);
            $this->statementUserByUsername->execute();
            if($user = $this->statementUserByUsername->fetch(PDO::FETCH_ASSOC)) {
                return $user;
            } else {
                header("Location: ./error.php?fehler=E027");;
            }
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E002");
        } finally {
            $this->db = null;
        }
    }
    function getUsernames() {
        $this->startConnection();
        try {
            $this->statementUsernames->execute();
            $allUsernames = array();
            while($user = $this->statementUsernames->fetch(PDO::FETCH_ASSOC)) {
                global $allUsernames;
                $allUsernames[] = $user;
            }
            global $allUsernames;
            return $allUsernames;
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E001");
        } finally {
            $this->db = null;
        }
    }
    
    function getCastlesByUser($id) {
        $this->startConnection();
        try {
            $this->statementCastlesByUserId->bindValue(":id", $id);
            $this->statementCastlesByUserId->execute();
            $allCastlesFromUser = array();
            while($castle = $this->statementCastlesByUserId->fetch(PDO::FETCH_ASSOC)) {
                global $allCastlesFromUser;
                $allCastlesFromUser[] = $castle;
            }
            global $allCastlesFromUser;
            return $allCastlesFromUser;
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E001");
        } finally {
            $this->db = null;
        }
    }
    
    function getCastle($id) {
        $this->startConnection();
        try {
            $this->statementCastle->bindValue(":id", $id);
            $this->statementCastle->execute();
            if($castle = $this->statementCastle->fetch(PDO::FETCH_ASSOC)) {
                $this->statementComments->bindValue(":castle_id", $id);
                $this->statementComments->execute();
                $this->statementPictures->bindValue(":castle_id", $id);
                $this->statementPictures->execute();
                $castle["pictures"] = $this->statementPictures->fetchAll(PDO::FETCH_ASSOC);;
                $castle["comments"] = $this->statementComments->fetchAll(PDO::FETCH_ASSOC);
                $this->statementUserById->bindValue(":id", $castle["author_id"]);
                $this->statementUserById->execute();
                $author = $this->statementUserById->fetch(PDO::FETCH_ASSOC);
                $castle["author"] = $author["username"];
                return $castle;
            } else {
                return "not found";
            }
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E003");
        } finally {
            $this->db = null;
        }
    }
    function getComments($castle_id) {
        $this->startConnection();
        try {
            $this->statementComments->bindValue(":castle_id", $castle_id);
            $this->statementComments->execute();
            return $this->statementComments->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            
        } finally {
            $this->db = null;
        }
    }
    function getAllCastles() {
        $this->startConnection();
        try {
            $this->statementAllCastles->execute();
            $allCastles = array();
            while($castle = $this->statementAllCastles->fetch(PDO::FETCH_ASSOC)) {
                $this->statementPictures->bindValue(":castle_id", $castle["id"]);
                $this->statementPictures->execute();
                $castle["pictures"] = $this->statementPictures->fetchAll(PDO::FETCH_ASSOC);  
                global $allCastles;
                $allCastles[] = $castle;
            }
            global $allCastles;
            return $allCastles;
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E004");
        } finally {
            $this->db = null;
        }
    }
    function getFiveNewestCastles() {
        $this->startConnection();
        try {
            $this->statementAllCastlesByDate->execute();
            $newCastles = array();
            while($castle = $this->statementAllCastlesByDate->fetch(PDO::FETCH_ASSOC)) {
                $this->statementPictures->bindValue(":castle_id", $castle["id"]);
                $this->statementPictures->execute();
                $castle["pictures"] = $this->statementPictures->fetchAll(PDO::FETCH_ASSOC); 
                global $newCastles;
                $newCastles[] = $castle;
            }
            return array_slice($newCastles, 0, 5);
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E005");
        } finally {
            $this->db = null;
        }
    }
    function getPicturesOfCastle($castle_id) {
        $this->startConnection();
        $this->statementPictures->bindValue("castle_id", $castle_id);
        $this->statementPictures->execute();
        return $this->statementPictures->fetchAll(PDO::FETCH_ASSOC);
    }
    function searchCastle($name) {
        $this->startConnection();
        try {
            $this->statementSearch->bindValue(":searchname", $name);
            $this->statementSearch->execute();
            $searchCastles = array();
            while($castle = $this->statementSearch->fetch(PDO::FETCH_ASSOC)) {
                $this->statementPictures->bindValue(":castle_id", $castle["id"]);
                $this->statementPictures->execute();
                $castle["pictures"] = $this->statementPictures->fetchAll(PDO::FETCH_ASSOC);
                global $searchCastles;
                $searchCastles[] = $castle;
            }
            return $searchCastles;    
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E006");
        } finally {
            $this->db = null;
        }
    }
    function getRandomCastle() {
        $this->startConnection();
        try {
            $this->statementAllCastles->execute();
            $allCastles = array();
            while($castle = $this->statementAllCastles->fetch(PDO::FETCH_ASSOC)) {
                $this->statementPictures->bindValue(":castle_id", $castle["id"]);
                $this->statementPictures->execute();
                $castle["pictures"] = $this->statementPictures->fetchAll(PDO::FETCH_ASSOC);
                global $allCastles;
                $allCastles[] = $castle;
            }
            global $allCastles;
            $randomInt = rand(0, count($allCastles) - 1);
            return $allCastles[$randomInt];
        } catch(PDOException $e) {
            header("Location: ./error.php?fehler=E007");
        } finally {
            $this->db = null;
        }
    }
    function saveCastle($castle) {
        if(is_array($castle)) {
            $this->startConnection();
            try {
                //$this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
                $this->db->beginTransaction();
                $this->statementCastleByName->bindValue(":name", $castle[":name"]);
                $this->statementCastleByName->execute();
                $fetch_castle = $this->statementCastleByName->fetch(PDO::FETCH_ASSOC);
                if($fetch_castle !== false) {
                    $this->db->rollBack();
                    header("Location: ./error.php?fehler=E026");
                    return;
                }
                $this->statementSaveCastle->execute($castle);
                $this->db->commit();
            } catch(PDOException $e) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E008");
            } finally {
                $this->db = null;
            }
        } else {
           //kein array 
            header("Location: ./error.php?fehler=E009");
        }
    }
    function updateCastle($id, $data) {
        if(is_array($data)) {
            $this->startConnection();
            try {
                // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
                $this->db->beginTransaction();
                $this->statementCastle->bindValue(":id", $id);
                $this->statementCastle->execute();
                $castle = $this->statementCastle->fetch(PDO::FETCH_ASSOC);
                if($castle === false) {
                    $this->db->rollBack();
                    header("Location: ./error.php?fehler=E025");
                    return;
                }
                $this->statementUpdateCastle->execute(array_merge($data, array("id" => $id)));
                $this->db->commit();
            } catch(PDOException $e) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E010");
            } finally {
                $this->db = null;
            }
        } else {
           //$data kein array 
            header("Location: ./error.php?fehler=E009");
        }
    }
    function deleteCastle($id) {
        $this->startConnection();
        try {
            // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
            $this->db->beginTransaction();
            $this->statementCastle->bindValue(":id", $id);
            $this->statementCastle->execute();
            $castle = $this->statementCastle->fetch(PDO::FETCH_ASSOC);
            if($castle === false) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E024");
                return;
            }
            $this->statementDeleteCastle->bindValue(":id", $id);
            $this->statementDeleteCastle->execute();
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            header("Location: ./error.php?fehler=E011");
        } finally {
            $this->db = null;
        }
    }
    function saveUser($user) {
        if(is_array($user)) {
            $this->startConnection();
            try {
                // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
                $this->db->beginTransaction();
                $this->statementUserByUsername->bindValue(":username", $user[":username"]);
                $this->statementUserByUsername->execute();
                $fetch_user = $this->statementUserByUsername->fetch(PDO::FETCH_ASSOC);
                if($fetch_user !== false) {
                    $this->db->rollBack();
                    header("Location: ./error.php?fehler=E023");
                    return;
                }
                $this->statementSaveUser->execute($user);
                $this->db->commit();
            } catch(PDOException $e) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E012");
            } finally {
                $this->db = null;
            }
        } else {
           //kein array 
            header("Location: ./error.php?fehler=E009");
        }
    }
    function updateUserName($id, $username) {
        $this->startConnection();
        try {
            // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
            $this->db->beginTransaction();
            $this->statementUserById->bindValue(":id", $id);
            $this->statementUserById->execute();
            $user = $this->statementUserById->fetch(PDO::FETCH_ASSOC);
            if($user === false) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E022");
                return;
            }
            $this->statementUpdateUserName->bindValue(":id", $id);
            $this->statementUpdateUserName->bindValue(":username", $username);
            $this->statementUpdateUserName->execute();
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            header("Location: ./error.php?fehler=E010");
        } finally {
            $this->db = null;
        }
    }
    function updateUserPassword($id, $password) {
        $this->startConnection();
        try {
            // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
            $this->db->beginTransaction();
            $this->statementUserById->bindValue(":id", $id);
            $this->statementUserById->execute();
            $user = $this->statementUserById->fetch(PDO::FETCH_ASSOC);
            if($user === false) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E022");
                return;
            }
            $this->statementUpdateUserPassword->bindValue(":id", $id);
            $this->statementUpdateUserPassword->bindValue(":password", $password);
            $this->statementUpdateUserPassword->execute();
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            header("Location: ./error.php?fehler=E010");
        } finally {
            $this->db = null;
        }
    }
    function updateUserDescription($id, $description) {
        $this->startConnection();
        try {
            // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
            $this->db->beginTransaction();
            $this->statementUserById->bindValue(":id", $id);
            $this->statementUserById->execute();
            $user = $this->statementUserById->fetch(PDO::FETCH_ASSOC);
            if($user === false) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E022");
                return;
            }
            $this->statementUpdateUserDescription->bindValue(":id", $id);
            $this->statementUpdateUserDescription->bindValue(":description", $description);
            $this->statementUpdateUserDescription->execute();
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            header("Location: ./error.php?fehler=E010");
        } finally {
            $this->db = null;
        }
    }
    function deleteUser($id) {
        $this->startConnection();
        try {
            $this->db->beginTransaction();
            $this->statementUserById->bindValue(":id", $id);
            $this->statementUserById->execute();
            $user = $this->statementUserById->fetch(PDO::FETCH_ASSOC);
            if($user === false) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E030");
                return;
            }
            $this->statementDeleteUser->bindValue(":id", $id);
            $this->statementDeleteUser->execute();
            $this->db->commit;
        } catch(PDOException $e) {
            $this->db->rollback;
        } finally {
            $this->db = null;
        }
    }
    function saveComment($comment) {
        if(is_array($comment)) {
            $this->startConnection();
            try {
                $this->statementSaveComment->execute($comment);
            } catch(PDOException $e) {
                header("Location: ./error.php?fehler=E013");
            } finally {
                $this->db = null;
            }
        } else {
           //Parameter ist kein array 
            header("Location: ./error.php?fehler=E009");
        }
    }
    function savePicture($picture){
        if(is_array($picture)) {
            $this->startConnection();
            try {
                $this->statementSavePicture->execute($picture);
            } catch(PDOException $e) {
                header("Location: ./error.php?fehler=E014");
            } finally {
                $this->db = null;
            }
        } else {
           //Parameter ist kein array 
            header("Location: ./error.php?fehler=E009");
        }
    }
    function deletePicture($id){
        $this->startConnection();
        try {
            // $this->db->exec("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE"); // nur bei mysql
            $this->db->beginTransaction();
            $this->statementGetToDeletePicture->bindValue(":id", $id);
            $this->statementGetToDeletePicture->execute();
            $picture = $this->statementGetToDeletePicture->fetch(PDO::FETCH_ASSOC);
            if($picture === false) {
                $this->db->rollBack();
                header("Location: ./error.php?fehler=E021");
                return;
            }
            $path_to_delete = $picture["path"];
            $this->statementDeletePicture->bindValue(":id", $id);
            $this->statementDeletePicture->execute();
            if(file_exists($path_to_delete)) {
                unlink($path_to_delete);
            }
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            header("Location: ./error.php?fehler=E015");
        } finally {
            $this->db = null;
        }
    }
}
?>
