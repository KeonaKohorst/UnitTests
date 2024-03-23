<?php

namespace Keonag\UnitTests;
class ValidationMethods{
    
    public function validateEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email is a valid format\n";
            return "Valid";
        } else {
            echo "Email is an invalid format\n";
            return "Invalid";
        }
    }
    
    public function validateName($name){
        //sanitize spaces
        $name = trim($name);
        $name = preg_replace('/\s\s+/', '', $name);
        $name = preg_replace('/\t+/', '', $name);
        $name = preg_replace('/\n\r+/', '', $name);
        $name = ucwords(strtolower($name));
        
        //check for non alphabetic characters
        if(ctype_alpha(str_replace(' ', '', $name)) === false){
            $ErrMsg = "Name must contain letters and spaces only\n";
            echo $ErrMsg;
            
            return "Invalid";
        }else{
            echo ":" . $name . ":\n";
            return "Valid";
        }
    }
    
    public function validateURL($url){
        if(filter_var($url, FILTER_VALIDATE_URL) === false){
            $ErrMsg = "Not a valid URL\n";
            echo $ErrMsg;
            return "Invalid";
        }else{
            return "Valid";
        }
    }
    
    public function validateTitle($title){
        $title = trim($title);
        $title = preg_replace('/\s\s+/', '', $title);
        $title = preg_replace('/\t+/', '', $title);
        $title = preg_replace('/\n\r+/', '', $title);
        $title = ucwords(strtolower($title));
        
        //check to make sure it contains some letters
        $contains_letters = preg_match('/\pL/', $title);
        
        if(!$contains_letters){
            $ErrMsg = "Title must contain alphabetic characters\n";
            echo $ErrMsg;
            return "Invalid";
        }else{
            echo $title . "\n";
            return "Valid";
        }
    }
    
}
