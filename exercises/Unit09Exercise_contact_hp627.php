<?php
// Hitarth Patel, IT202 Section 002, Internet Applications, Unit 9 PHP/HTML In-Class Exercise, hp627@njit.edu
require_once('database.php');
class Contact
{
   public $name;
   public $email;
   public $message;
   function __construct($name, $email, $message)
   {
       $this->name = $name;
       $this->email = $email;
       $this->message = $message;
   }
   function saveContact()
   {
       $db = getDB();
       if ($db === null) {
           return false;
       }
       $query = "INSERT INTO contacts_hp627 (name, email, message) VALUES (?, ?, ?)";
       try {
           $stmt = $db->prepare($query);
           $stmt->bind_param(
               "sss",
               $this->name,
               $this->email,
               $this->message
           );
           $result = $stmt->execute();
           $db->close();
           return $result;
       } catch (mysqli_sql_exception $e) {
           error_log('saveContact failed: ' . $e->getMessage());
           $db->close();
           return false;
       }
   }
}
?>
