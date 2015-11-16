<?php
require_once(LIB_PATH.DS.'database.php');

/**
* 
*/
class Links extends DatabaseObject
{
	protected static $table_name ="links";
    protected static $db_fields = array ('link_id','user_id','path','date');
    
    public $link_id;
	public $user_id;
    public $path;
    public $date;
	
	function __construct()
	{
		# code...
		if (isset($_SESSION['user_id'])){
			$this->user_id = $_SESSION['user_id'];
		}
	}

	    //common Database Methods    
    public static function find_all(){
        return self::find_by_sql("SELECT * FROM ".self::$table_name);               
    }
    
    public static function find_by_id($id=0){
        global $database;
        $result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE link_id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    public static function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while ($row =$database->fetch_array($result_set)){
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }
              
    private static function instantiate($record){
        $class_name = get_called_class();
        $object = new $class_name; 
        //$object->user_id    = $record['user_id'];
        //$object->nick_name  = $record['nick_name'];
        //$object->user_pass   = $record['user_pass'];
        //$object->first_name = $record['first_name'];
        //$object->last_name  = $record['last_name'];
        //$object->email      = $record['email'];
        //$object->birth_date = $record['birth_date'];
        //$object->city       = $record['city'];
        //$object->gender     = $record['gender'];
        
        foreach ($record as $attribute =>$value){
            if ($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }
        }        
        return $object;
    }
    
    private function has_attribute($attribute){
        $object_vars = $this->attributes();
        return array_key_exists($attribute,$object_vars);
    }
    
    protected function attributes(){
        $attributes = array();
        foreach(self::$db_fields as $field){
            if(property_exists($this,$field)){
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
    
    protected function sanitized_attributes(){
        global $database;
        $clean_attributes = array();
        foreach($this->attributes() as $key => $value){
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }
    
    public function save(){
        return isset($this->link_id) ? $this->update() : $this->create();
    }
        
    public function create(){
        global $database;
        $attributes = $this->sanitized_attributes();
        $sql  = "INSERT INTO ".self::$table_name." (";
        $sql .= join(", ",array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '",array_values($attributes));
        $sql .= "')";
        if ($database->query($sql)){
            $this->link_id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }   
    
    public function update(){
        global $database;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($attributes as $key=>$value){
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sql  = "UPDATE ".self::$table_name." SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE link_id=".$database->escape_value($this->link_id);
        $database->query($sql);
        return ($database->affected_rows()==1) ? true : false; 
    } 
    
    public function delete(){
        global $database;
        $sql  = "DELETE FROM ".self::$table_name;
        $sql .= " WHERE link_id=".$database->escape_value($this->link_id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows()==1) ? true : false;
    }

}

?>