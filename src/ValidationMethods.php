<?php

namespace Keonag\UnitTests;
class ValidationMethods{
    
    /**
     * Returns true if email is valid format, false if not.
     * 
     * @param string $email The email to be validated
     * @return bool
     */
    public function validate_email($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result_message = "Email " . $email . " is a valid format\n";
            echo $result_message;
            return true;
        } else {
            $result_message = "Email " . $email . " is an invalid format\n";
            echo $result_message;
            return false;
        }
    }
    
    /**
     * Checks if the given name consists of only letters.
     * Returns true if only letters, false if not.
     * 
     * @param string $name The name to be validated
     * @return bool
     */
    public function validate_name($name){
        //sanitize spaces
        //$name = sanitize_string($name);
        $name = trim($name);
        $name = preg_replace('/\s\s+/', '', $name);
        $name = preg_replace('/\t+/', '', $name);
        $name = preg_replace('/\n\r+/', '', $name);
        $name = ucwords(strtolower($name)); //put in title case
        
        //check for non alphabetic characters
        if(!$this->only_letters($name)){
            $result_message = "Name " . $name . " must contain letters and spaces only\n";
            echo $result_message;
            
            return false;
        }else{
            $result_message = "Name " . $name . " is valid\n";
            echo $result_message;
            return true;
        }
    }
    
    /**
     * Checks if the given URL is in the correct format
     * 
     * @param string $url The URL to be validated
     * @return bool
     */
    public function validate_URL($url){
        if(filter_var($url, FILTER_VALIDATE_URL) === false){
            $result_message = $url . " is not a valid URL\n";
            echo $result_message;
            return false;
        }else{
            $result_message = $url . " is a valid URL\n";
            echo $result_message;
            return true;
        }
    }
    
    /**
     * Checks if the title contains at least one letter
     * Returns true if yes, returns false if no.
     * 
     * Also sanitizes the input string.
     * 
     * @param string $title The title to be validated
     * @return bool
     */
    public function validate_title($title){
        //$title = this->sanitize_string($title);
        $title = trim($title);
        $title = preg_replace('/\s\s+/', '', $title);
        $title = preg_replace('/\t+/', '', $title);
        $title = preg_replace('/\n\r+/', '', $title);
        $title = ucwords(strtolower($title)); //put in title case
        
        if(!$this->contains_letters($title)){
            $result_message = "Title " . $title . " must contain alphabetic characters\n";
            echo $result_message;
            return false;
        }else{
            $result_message = "Title " . $title . " is valid\n";
            echo $result_message;
            return true;
        }
    }
    
    /**
     * Checks if the description has at least 1 letter.
     * Returns false if it doesn't, returns true if it does.
     * 
     * @param string $description The description to validate
     * @return bool
     */
    public function validate_description($description){
        if(!$this->contains_letters($description)){
            $result_message = "Description " . $description . " must contain alphabetic characters\n";
            echo $result_message;
            return false;
        }else{
            $result_message = "Description " . $description . " is valid\n";
            echo $result_message;
            return true;
        }
    }
    
   /**
    * Removes unnecessary white space from a string and puts it in title case
    * and returns the sanitized string
    * 
    * @param string $string The string to sanitize
    */
   public function sanitize_string($string){
       echo "String to sanitize" . $string . " : ";
       $string = trim($string);
       $string = preg_replace('/\s\s+/', ' ', $string);
       $string = preg_replace('/\t+/', '', $string);
       $string = preg_replace('/\n\r+/', '', $string);
       $string = ucwords(strtolower($string)); //put in title case
       
       echo "Sanitized: " . $string . "\n";

       return $string;
   }
   
   /**
    * Checks if the given value contains at least 1 letter
    * 
    * @param string $value The string to check if it contains letters
    */
   public function contains_letters($value){
       $contains_letters = preg_match('/\pL/', $value);
       return $contains_letters;
   }
   
   /**
    * Checks if the given string is made up of only alphabetic characters
    * 
    * @param string $value The string to check
    */
   public function only_letters($value) {
       $alphabetOnly = ctype_alpha(str_replace(' ', '', $value));
       return $alphabetOnly;
   }

}
