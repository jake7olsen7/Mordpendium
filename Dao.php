<?php
require_once 'KLogger.php';
class Dao {
  private $host = "us-cdbr-iron-east-03.cleardb.net";
  private $db = "heroku_c80582da74a0307";
  private $user = "b1426781dfcbfd";
  private $pass = "8253ca97";
  protected $logger;
  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }
  public function getConnection () {
    $this->logger->LogDebug("Getting a connection.");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      $this->logger->LogError(__CLASS__ . "::" . __FUNCTION__ . " The database exploded " . print_r($e,1));
      echo print_r($e,1);
      exit;
    }
    return $conn;
  }
    public function getUserID ($userName) {
		$conn = $this->getConnection();
		$rows = $conn->query("select *  from users where userName = \"{$userName}\"");
		foreach ($rows as $row) {
			$returnguy = $row["userID"];
		}
		return $returnguy;
	}
	public function getUnitID ($unitName) {
		$conn = $this->getConnection();
		$rows = $conn->query("select *  from unit where unitName = \"{$unitName}\"");
		foreach ($rows as $row) {
			$returnguy = $row["unitID"];
		}
		return $returnguy;
	}
  	public function getUserUnits($userID) {
		$conn = $this->getConnection();
		$rows = $conn->query("select unitID from user_has_unit where userID = \"{$userID}\"");
		$count = 0;
		$returnguy = array();
		foreach ($rows as $row) {
			$returnguy[$count] = $row["unitID"];
			$count = $count+1;
		}
		return $returnguy;

	}
	public function getUserPassword ($userName) {
		$conn = $this->getConnection();
		$getQuery = "select password from users where userName = :userName";
		$q = $conn->prepare($getQuery);
		$q->bindParam(":userName", $userName);
		$q->execute();
		return reset($q->fetch());
	}
		public function getUserEmail ($userName) {
		$conn = $this->getConnection();
		$getQuery = "select email from users where userName = :userName";
		$q = $conn->prepare($getQuery);
		$q->bindParam(":userName", $userName);
		$q->execute();
		return $q->fetch();
	}
	
	
	public function getUnit ($unitID) {
		$conn = $this->getConnection();
		$rows = $conn->query("select *  from unit where unitID = \"{$unitID}\"");
		return $rows->fetchAll();
	}



    public function deleteUnit ($unitID) {
    $conn = $this->getConnection();
    $saveQuery = "DELETE FROM unit WHERE unitID = :unitID";
    $q = $conn->prepare($saveQuery);
	$q->bindParam(":unitID", $unitID);
    $q->execute();
	$saveQuery = "DELETE FROM user_has_unit WHERE unitID = :unitID";
    $q = $conn->prepare($saveQuery);
	$q->bindParam(":unitID", $unitID);
    $q->execute();
  }







  public function createUser ($userName, $email, $password) {
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO users (userName, email, password, createDate, isAdmin) VALUES (:userName, :email, :password, CURDATE(), false)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":userName", $userName);
    $q->bindParam(":email", $email);
    $q->bindParam(":password", $password);
    $q->execute();
  }
  	public function userSetUnit ($userID, $unitID) {
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO user_has_unit (userID, unitID) VALUES (:userID, :unitID)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":userID", $userID);
    $q->bindParam(":unitID", $unitID);
    $q->execute();	
	}
    public function createUnit ($unitName, $unitType, $unitM, $unitWS, $unitBS, $unitS, $unitT, $unitW, $unitI, $unitA, $unitL, $unitAS,
	$MunitM, $MunitWS, $MunitBS, $MunitS, $MunitT, $MunitW, $MunitI, $MunitA, $MunitL, $unitSL, $unitEXP, $unitSkills, $unitItems) {
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO Unit (unitName, unitType, m, ws, bs, s, t, w, i, a, ld, sv, Mm, Mws, Mbs, Ms, Mt, Mw, Mi, Ma, Mld, skills, experience, abilities, equipment) VALUES (:unitName, :unitType, :unitM, :unitWS, :unitBS, :unitS, :unitT, :unitW, :unitI, :unitA, :unitL, :unitAS, :MunitM, :MunitWS, :MunitBS, :MunitS, :MunitT, :MunitW, :MunitI, :MunitA, :MunitL, :unitSL, :unitEXP, :unitSkills, :unitItems)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":unitName", $unitName);
    $q->bindParam(":unitType", $unitType);
	
    $q->bindParam(":unitM", $unitM);
	$q->bindParam(":unitWS", $unitWS);
	$q->bindParam(":unitBS", $unitBS);
	$q->bindParam(":unitS", $unitS);
	$q->bindParam(":unitT", $unitT);
	$q->bindParam(":unitW", $unitW);
	$q->bindParam(":unitI", $unitI);
	$q->bindParam(":unitA", $unitA);
	$q->bindParam(":unitL", $unitL);
	$q->bindParam(":unitAS", $unitAS);
	
	$q->bindParam(":MunitM", $MunitM);
	$q->bindParam(":MunitWS", $MunitWS);
	$q->bindParam(":MunitBS", $MunitBS);
	$q->bindParam(":MunitS", $MunitS);
	$q->bindParam(":MunitT", $MunitT);
	$q->bindParam(":MunitW", $MunitW);
	$q->bindParam(":MunitI", $MunitI);
	$q->bindParam(":MunitA", $MunitA);
	$q->bindParam(":MunitL", $MunitL);
	
	$q->bindParam(":unitSL", $unitSL);
	$q->bindParam(":unitEXP", $unitEXP);
	$q->bindParam(":unitSkills", $unitSkills);
	$q->bindParam(":unitItems", $unitItems);
    $q->execute();
	}
  	public function updateUserEmail ($userName, $email) {
		$conn = $this->getConnection();
		$saveQuery = "UPDATE users SET email = :email where userName = :userName";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":email", $email);
		$q->bindParam(":userName", $userName);
		$q->execute();
	}
	public function updateUserPassword ($userName, $password) {
		$conn = $this->getConnection();
		$saveQuery = "UPDATE users SET password = :password where userName = :userName";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":password", $password);
		$q->bindParam(":userName", $userName);
		$q->execute();
	}
	
    public function updateUnit ($unitID, $unitName, $unitType, $unitM, $unitWS, $unitBS, $unitS, $unitT, $unitW, $unitI, $unitA, $unitL, $unitAS,
	$MunitM, $MunitWS, $MunitBS, $MunitS, $MunitT, $MunitW, $MunitI, $MunitA, $MunitL, $unitSL, $unitEXP, $unitSkills, $unitItems) {
    $conn = $this->getConnection();
    $saveQuery = "UPDATE unit SET unitName = :unitName, unitType = :unitType, m = :unitM, ws = :unitWS, bs = :unitBS, s = :unitS, t = :unitT, w = :unitW, i = :unitI, a = :unitA, ld = :unitL, sv = :unitAS, Mm = :MunitM, Mws = :MunitWS, Mbs = :MunitBS, Ms = :MunitS, Mt = :MunitT, Mw = :MunitW, Mi = :MunitI, Ma = :MunitA, Mld = :MunitL, skills = :unitSL, experience = :unitEXP, abilities = :unitSkills, equipment = :unitItems WHERE unitID = :unitID";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":unitName", $unitName);
    $q->bindParam(":unitType", $unitType);
	
    $q->bindParam(":unitM", $unitM);
	$q->bindParam(":unitWS", $unitWS);
	$q->bindParam(":unitBS", $unitBS);
	$q->bindParam(":unitS", $unitS);
	$q->bindParam(":unitT", $unitT);
	$q->bindParam(":unitW", $unitW);
	$q->bindParam(":unitI", $unitI);
	$q->bindParam(":unitA", $unitA);
	$q->bindParam(":unitL", $unitL);
	$q->bindParam(":unitAS", $unitAS);
	
	$q->bindParam(":MunitM", $MunitM);
	$q->bindParam(":MunitWS", $MunitWS);
	$q->bindParam(":MunitBS", $MunitBS);
	$q->bindParam(":MunitS", $MunitS);
	$q->bindParam(":MunitT", $MunitT);
	$q->bindParam(":MunitW", $MunitW);
	$q->bindParam(":MunitI", $MunitI);
	$q->bindParam(":MunitA", $MunitA);
	$q->bindParam(":MunitL", $MunitL);
	
	$q->bindParam(":unitSL", $unitSL);
	$q->bindParam(":unitEXP", $unitEXP);
	$q->bindParam(":unitSkills", $unitSkills);
	$q->bindParam(":unitItems", $unitItems);
	$q->bindParam(":unitID", $unitID);
    $q->execute();
  }
}