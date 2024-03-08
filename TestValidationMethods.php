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
    
}

class TestValidationMethods extends \PHPUnit\Framework\TestCase{
        
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
                $result = $tester->validateEmail("kohorstkeona$%");
                $this->assertEquals("Invalid", $result);
        }
}



