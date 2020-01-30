<?php
class Database
{
    public $host= DB_HOST;
    public $username= DB_USER;
    public $password= DB_PASS;
    public $db_name= DB_NAME;

    public $link;
    public $error;
/*
 *  Construct 
 */
    public function __construct()
    {
        $this->connect();
    }
/*
 *  Connection 
 */
private function connect()
{
    $this->link=new mysqli($this->host, $this->username, $this->password, $this->db_name);
    if(!$this->link)
    {
        $this->error="Connection Fails:" .$this->connect_error;
        return false;
    }
}

/*
 *  Select 
 */

 public function select($sql)
 {
     $result=$this->link->query($sql) or die($this->link->error._LINE_);
        
        if($result->num_rows>0)
        {
            return $result;
        }
        else
        {
            return false;
        }
 }

 /*
 *  Insert 
 */

 public function insert($sql)
 {
     $insert_row=$this->link->query($sql) or die($this->link->error._LINE_);
     //validate insert
     if($insert_row)
     {
        header("Location: index.php?msg=" .urlencode('Record Added'));
        exit();
     }
     else
     {
        die('Error:('.$this->link->errno .')' . $this->link->error);
     }
 }

 /*
 *  Update
 */

public function update($sql)
{
    $update_row=$this->link->query($sql) or die($this->link->error._LINE_);
    //validate update
    if($update_row)
    {
       header("Location: index.php?msg=" .urlencode('Record Updated'));
       exit();
    }
    else
    {
       die('Error:('.$this->link->errno .')' . $this->link->error);
    }
}

/*
 *  Delete
 */

public function delete($sql)
{
    $delete_row=$this->link->query($sql) or die($this->link->error._LINE_);
    //validate update
    if($delete_row)
    {
       header("Location: index.php?msg=" .urlencode('Record Deleted'));
       exit();
    }
    else
    {
       die('Error:('.$this->link->errno .')' . $this->link->error);
    }
}
}