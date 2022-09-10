<?php 
  class homeModule{

    function __construct(){
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=test_mvc", "root", "");
            // // set the PDO error mode to exception
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    function home(){
        $sql = 'SELECT * FROM `users`';
        $stmt=$this->con->prepare($sql);
        $stmt->execute();
        $rArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rArray;
    }

    public function insertRecord($obj)
    {
        try
        {	
            $sql = "INSERT INTO users (first_name, last_name, email, street, zip_code, city) VALUES (?,?,?,?,?,?)";
            $stmt=$this->con->prepare($sql);
            $data = array($obj->first_name, $obj->last_name, $obj->email, $obj->street, $obj->zip_code, $obj->city); 
            $isDone = $stmt->execute($data);
            return $isDone;
        }
        catch (Exception $e) 
        {
            throw $e;
        }
    }

    public function updateRecord($obj)
    {
        try
        {	
            $id = $obj->id;
            $sql = "UPDATE users SET first_name=?, last_name=?, email=?, street=?, zip_code=?, city=? WHERE id=?";
            $stmt=$this->con->prepare($sql);
            $data = array($obj->first_name, $obj->last_name, $obj->email, $obj->street, $obj->zip_code, $obj->city, $id); 
            $isDone = $stmt->execute($data);
            return $isDone;
        }
        catch (Exception $e) 
        {
            throw $e;
        }
    }
    public function deleteRecord($id)
    {
        try
        {	
            $sql = "DELETE FROM users WHERE id=?";
            $stmt=$this->con->prepare($sql);
            $data = array($id); 
            $isDone = $stmt->execute($data);
            return $isDone;
        }
        catch (Exception $e) 
        {
            throw $e;
        }
    }

    public function selectRecord($id)
		{
			try{
                $stmt=$this->con->prepare("SELECT * FROM users WHERE id=?");
				$stmt->execute([$id]);
				$res = $stmt->fetch();	
                return $res;
			}catch(Exception $e)
			{
				throw $e; 	
			}
		}

    public function exportToJson()
		{
			try{
              $stmt=$this->con->prepare("SELECT * FROM users");
			  $stmt->execute();
              $rArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $res = json_encode($rArray);
              return $res;
			}catch(Exception $e)
			{
				throw $e; 	
			}
			
		}


    public function exportToXml()
		{
			try{
                $stmt=$this->con->prepare("SELECT * FROM users");
				$stmt->execute();
                $rArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rArray;
			}catch(Exception $e)
			{
				throw $e; 	
			}
			
		}

    public function filterByCity($key)
		{
		try{
            $stmt=$this->con->prepare("SELECT * FROM users WHERE city LIKE ?");
			$stmt->execute(["%$key%"]);
            $rArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rArray;
			}catch(Exception $e)
			{
				throw $e; 	
			}
			
		}
    
  }
?>