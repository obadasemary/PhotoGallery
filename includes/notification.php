<?php
require_once(LIB_PATH.DS.'database.php');

class Notification extends DatabaseObject {
    
    protected static $table_name="notification";
    protected static $db_fields=array('notification_id', 'user_id', 'maker_id', 'photo_id', 'event_type','time', 'seen');
    
    public $notification_id;
    public $user_id;
    public $maker_id;
    public $photo_id;
    public $event_type;
    public $time;
    public $seen;
    
    

    public function Notification (){

        $this->user_id  = $_SESSION['user_id'] ;


    }

    
    public static function make($photo_id, $maker_id, $user_id , $event_type){
        if (!empty($photo_id) && !empty($user_id) && !empty($maker_id) && !empty($event_type)){
            $new_notification = new notification();
            $new_notification->photo_id =$photo_id;
            $new_notification->time = strftime("%Y-%m-%d %H:%M:%S",time());
            $new_notification->maker_id = $maker_id;
            $new_notification->user_id = $user_id;
            $new_notification->event_type = $event_type;
            $new_notification->seen = 0;
            return $new_notification;
        } else {
            return false;
        }
    }
    
    public static function find_notifications_on($user_id=0){
        global $database;
        $sql  = "SELECT * FROM ".self::$table_name;
        $sql .= " WHERE user_id=".$database->escape_value($user_id);
        $sql .= " ORDER BY created ASC";
        return self::find_by_sql($sql);
    }

     public static function seen($id){
        global $database;
        return $database->query("UPDATE ".self::$table_name.' SET seen=1 WHERE notification_id='.$id);               
    }
    
        //common Database Methods    
    public static function find_all($user_id){
        return self::find_by_sql("SELECT * FROM ".self::$table_name.' WHERE user_id='.$user_id.' ORDER BY notification_id DESC');               
    }

    public static function find_all_notseen($user_id){
        return self::find_by_sql("SELECT * FROM ".self::$table_name.' WHERE user_id='.$user_id.' AND seen=0 ORDER BY notification_id DESC');               
    }
    
    public static function find_by_id($id=0){
        global $database;
        $result_array = static::find_by_sql("SELECT * FROM ".self::$table_name." WHERE notification_id={$id} LIMIT 1");
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
        return isset($this->notification_id) ? $this->update() : $this->create();
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
            $this->notification_id = $database->insert_id();
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
        $sql .= " WHERE notification_id=".$database->escape_value($this->notification_id);
        $database->query($sql);
        return ($database->affected_rows()==1) ? true : false; 
    } 
    
    public function delete(){
        global $database;
        $sql  = "DELETE FROM ".self::$table_name;
        $sql .= " WHERE notification_id=".$database->escape_value($this->notification_id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows()==1) ? true : false;
    }
}




?>

