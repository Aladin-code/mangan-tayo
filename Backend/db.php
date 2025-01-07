<?php
class myDB{
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $db_name="mangan_tayo";
    public $res;
    private $conn;

    public function __construct(){
        try{
            $this->conn = new mysqli($this->servername, $this->username,$this->password, $this->db_name);
        }catch(Exception $e){
            die("Database connection error!. <br>".$e);
        }
    }

    public function __destruct(){
        $this->conn->close();
    }

    public function insert($table, $data){
        try{
            $table_columns = implode(',',array_keys($data));
            $prep=$types="";
            foreach($data as $key => $value){
                $prep .= '?,';
                $types .= substr(gettype($value),0,1);
            }
            $prep = substr($prep, 0, -1);
            $stmt = $this->conn->prepare("INSERT INTO $table($table_columns) VALUES($prep)");
            $stmt->bind_param($types, ...array_values($data));
            $stmt->execute();
            $stmt->close();
        }catch(Exception $e){
            die("Error while inserting data!. <br>".$e);
        }
    }

    public function update($table, $data, $condition) {
        try {
            $set = "";
            $datatypes = "";
            $conditionTypes = "";
            $cond = "";
    
        
            foreach($data as $key => $value) {
                $set .= $key . ' = ?, ';
                // name = ?,email=?,course_year_section =?,
                // "UPDATE users SET email = ? WHERE username = ?
                $datatypes .= substr(gettype($value), 0, 1);
            }
            $set = substr($set, 0, -2); 
   
            foreach($condition as $key => $value) {
                $cond .= $key . ' = ? AND ';
             
                $conditionTypes .= substr(gettype($value), 0, 1);
            }
            $cond = substr($cond, 0, -5); 
     
            $stmt = $this->conn->prepare("UPDATE $table SET $set WHERE $cond");
            //UPDATE users SET email = 'newemail@example.com' WHERE id = 1;
            $stmt->bind_param($datatypes . $conditionTypes, ...array_values($data), ...array_values($condition));
            $stmt->execute();
            $stmt->close();
        } catch(Exception $e) {
            die("Error while updating data!. <br>" . $e->getMessage());
        }
    }


    public function delete($table, $where){
        try {
            $cond = "";
            $types = "";
            foreach($where as $key => $value){
                $cond .= $key . ' = ? AND ';
                $types .= substr(gettype($value),0,1);
            }
            $cond = substr($cond,0,-5);
            $stmt = $this->conn->prepare("DELETE FROM $table WHERE $cond");

            $stmt->bind_param($types, ...array_values($where));
            $stmt->execute();
            $stmt->close();
        }catch(Exception $e) {
            die("Error while updating data!. <br>" . $e->getMessage());
        }
    }
    

    public function select($table, $row="*", $where=NULL){
        try {
            if (!is_null($where)) {
                $cond = $types = "";
                foreach ($where as $key => $value) {
                    $cond .= $key . " = ? AND ";
                    $types .= substr(gettype($value), 0, 1);
                }
                $cond = substr($cond, 0, -4); 
                $stmt = $this->conn->prepare("SELECT $row FROM $table WHERE $cond");
                $stmt->bind_param($types, ...array_values($where));
            } else {
                $stmt = $this->conn->prepare("SELECT $row FROM $table");
            }
            $stmt->execute();
            $this->res = $stmt->get_result();
        } catch (Exception $e) {
            die("Error requesting data!. <br>" . $e);
        }
    }
    public function search($table, $search_value) {
        $search_value = $this->conn->real_escape_string($search_value);
        $query = "SELECT * FROM $table WHERE title LIKE '%$search_value%' OR category LIKE '%$search_value%' OR date LIKE '%$search_value%'";
        $this->res = $this->conn->query($query);
        $datas = [];
        while($row = $this->res->fetch_assoc()){
            array_push($datas, $row);
        }
        return $datas;
    }
    
    public function escape_string($string) {
        return $this->conn->real_escape_string($string);
    }

    public function getComments($blogID) {
        try {
            // Prepare the SQL query with JOIN
            $query = "SELECT c.comment_id, c.comment_text, u.username  
                  FROM comments c
                  JOIN user_tbl u ON c.userID = u.userID
                  WHERE c.blogID = ?
                  ORDER BY c.comment_id DESC";
            
   
            
            $stmt = $this->conn->prepare($query);
    
            // Bind the blogID parameter
            $stmt->bind_param("i", $blogID);
    
            // Execute the query
            $stmt->execute();
    
            // Fetch the result
            $this->res = $stmt->get_result();
    
        } catch (Exception $e) {
            die("Error fetching comments! <br>" . $e);
        }
    }
    
    public function getLikes($table, $blogID) {
        try {
            $query = "SELECT COUNT(*) as like_count FROM $table WHERE blogID = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $blogID);
            $stmt->execute();
            $this->res = $stmt->get_result();
            $likeData = $this->res->fetch_assoc();
            return $likeData['like_count']; 
        } catch (Exception $e) {
            die("Error fetching like count! <br>" . $e->getMessage());
        }
    }

    public function hasLiked($userID, $blogID) {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) as liked FROM likes WHERE userID = ? AND blogID = ?");
            $stmt->bind_param("ii", $userID, $blogID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Fetch the result
            $row = $result->fetch_assoc();
            return $row['liked'] > 0; // Return true if liked, otherwise false
    
        } catch (Exception $e) {
            die("Error checking like status: " . $e->getMessage());
        }
    }
    
}


?>