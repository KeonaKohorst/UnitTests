<?php
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
        if(ctype_alpha(str_replace(' ', '', $name)) === false){
            $ErrMsg = "Name must contain letters and spaces only";
            echo $ErrMsg;
            
            return "Invalid";
        }else{
            echo ":" . $name . ":";
            return "Valid";
        }
    }
    
    public function validateURL($url){
        if(filter_var($url, FILTER_VALIDATE_URL) === false){
            $ErrMsg = "Not a valid URL";
            echo $ErrMsg;
            return "Invalid";
        }else{
            return "Valid";
        }
    }
    
}

class TestValidationMethods extends \PHPUnit\Framework\TestCase{
        /*
         * Email field validation tests
         */
        public function testEmailValidation(){
                $tester = new ValidationMethods();
                $result = $tester->validateEmail("kohorstkeona@outlook.com");
                $this->assertEquals("Valid", $result);
        }
        
        public function testEmailValidation2(){
                $tester = new ValidationMethods();
                $result = $tester->validateEmail("kohorstkeona@outlook");
                $this->assertEquals("Invalid", $result);
        }
        
        public function testEmailValidation3(){
                $tester = new ValidationMethods();
                $result = $tester->validateEmail("kohorst#keona$%");
                $this->assertEquals("Invalid", $result);
        }
        
        
        /*
         * Name field validation tests
         */
        public function testNameValidation(){
                $tester = new ValidationMethods();
                $result = $tester->validateName("Keona");
                $this->assertEquals("Valid", $result);
        }
        
        public function testNameValidation2(){
                $tester = new ValidationMethods();
                $result = $tester->validateName("$%^&*(");
                $this->assertEquals("Invalid", $result);
        }
        
        public function testNameValidation3(){
                $tester = new ValidationMethods();
                $result = $tester->validateName("Keona                 ");
                $this->assertEquals("Valid", $result);
        }
        
        public function testNameValidation4(){
                $tester = new ValidationMethods();
                $result = $tester->validateName("Elizabeth Joy");
                $this->assertEquals("Valid", $result);
        }
        
        public function testNameValidation5(){
                $tester = new ValidationMethods();
                $result = $tester->validateName("Susan-Anne");
                $this->assertEquals("Invalid", $result);
        }
        
        /*
         * URL field validation tests
         */
        public function testURLValidation(){
                $tester = new ValidationMethods();
                $result = $tester->validateURL("https://www.google.com");
                $this->assertEquals("Valid", $result);
        }
        
        public function testURLValidation2(){
                $tester = new ValidationMethods();
                $result = $tester->validateURL("google.com");
                $this->assertEquals("Invalid", $result);
        }
        
        public function testURLValidation3(){
                $tester = new ValidationMethods();
                $result = $tester->validateURL("yahoo");
                $this->assertEquals("Invalid", $result);
        }
        
        public function testURLValidation4(){
                $tester = new ValidationMethods();
                $result = $tester->validateURL("www.google.com");
                $this->assertEquals("Invalid", $result);
        }
        
        public function testURLValidation5(){
                $tester = new ValidationMethods();
                $result = $tester->validateURL("https://forums.phpfreaks.com/topic/284903-allow-only-letters-numbers-dash-underscore-or-space/");
                $this->assertEquals("Valid", $result);
        }
}



