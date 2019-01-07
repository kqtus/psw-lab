<?php
interface IDbInsert {
    function getInsertQuery();
}

interface IDbSelect {
    function getSelectQuery();
}

class DbQueryBuilder {
    protected $db_manager;

    public function __construct($db_mgr) {
        $this->db_manager = $db_mgr;
    }

    public function buildInsert($table, $values) {
        $query = "INSERT INTO " . $table . " VALUES(";
        $i = 0;

        foreach ($values as $value) {
            $formatted_val = $value;
            
            if (is_string($formatted_val)) {
                $formatted_val = "'" . $formatted_val . "'";
            }

            $query .= $formatted_val;
            $query .=  ($i == count($values) - 1) ? ");" : ", ";
            $i++;
        }

        return $query;
    }

    public function buildSelect($table, $keys) {
        $query = "SELECT ";
        $i = 0;

        foreach ($keys as $key) {
            $query .= $key;
            $query .=  ($i == count($values) - 1) ? "" : ", ";

            $i++;
        }

        $query .= " FROM " . $table . ";";

        return $query;
    }
}

class DbData {
    protected $db_manager = '';

    public function __construct($db_mgr) {
        $this->db_manager = $db_mgr;
    }

    protected function getDbManager() {
        return $this->db_manager;
    }

    protected function getQueryBuilder() {
        return $this->db_manager->getQueryBuilder();
    }
}

class DbUserData extends DbData implements IDbInsert, IDbSelect {
    public const USER_TABLE = "pr_users";

    public $mName = '';
    public $mLastName = '';
    public $mLogin = '';
    public $mPassword = '';
    public $mQuestionNum = '';
    public $mQuestionResponse = '';
    public $mNumber = '';
    public $mMail = '';

    public function __construct($db_mgr, $name, $last_name, $pswd, $question_num, $question_response, $number, $mail) {
        parent::__construct($db_mgr);
        
        $this->mName = (string)$name;
        $this->mLastName = (string)$last_name;
        $this->mPassword = (string)$pswd;
        $this->mQuestionNum = (string)$question_num;
        $this->mQuestionResponse = (string)$question_response;
        $this->mNumber = (string)$number;
        $this->mMail = (string)$mail;
    }

    public function getInsertQuery() {
        return $this->getQueryBuilder()->buildInsert(self::USER_TABLE, array(
            0,
            $this->mName,
            $this->mLastName,
            $this->mNumber,
            $this->mMail,
            $this->mPassword,
            $this->mQuestionNum,
            $this->mQuestionResponse
        ));
    }

    public function getSelectQuery() {
        return $this->getQueryBuilder()->buildSelect(self::USER_TABLE, array(
            "name",
            "last_name",
            "phone",
            "mail",
            "pswd",
            "question",
            "question_ans"
        ));
    }
}
        
class DbManager {
    public const DB_NAME = "psw_db";

    protected $database;
    protected $query_builder = '';

    public function __construct() {
        $this->query_builder = new DbQueryBuilder($this);
    }

    public function connect($host, $login, $pswd) {
        if (!($this->database = mysqli_connect($host, $login, $pswd)))
            return false;
        
        if (!mysqli_select_db($this->database, self::DB_NAME))
            return false;

        return true;
    }

    public function disconnect() {
        mysqli_disconnect($this->database);
    }
    
    public function getQueryBuilder() {
        return $this->query_builder;
    }

    public function insert($db_obj) {
        return mysqli_query($this->database, $db_obj->getInsertQuery());; 
    } 

    public function findUser(&$select_obj) {
        $result = mysqli_query($this->database, $db_obj->getSelectQuery());

        if ($result) {
            for ($i = 0; $row = mysqli_fetch_row($result); ++$i) {

            }
            return true;
        }
        return false;
    }

    public function userExists($select_obj) {
        $result = mysqli_query($this->database, $db_obj->getSelectQuery());
        return $result->num_rows > 0;
    }

    public function execQuery($query) {
        $result = mysqli_query($this->database, $query);
        return $result;
    }

    public function getLastError() {
        return mysqli_error($this->database);
    }
}
?>