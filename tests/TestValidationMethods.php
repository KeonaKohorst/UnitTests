<?php

namespace Keonag\UnitTests;

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
        
        /*
         * Title field validation tests
         */
        public function testTitleValidation1(){
                $tester = new ValidationMethods();
                $result = $tester->validateTitle("i am a regular title");
                $this->assertEquals("Valid", $result);
        }
        
        public function testTitleValidation2(){
                $tester = new ValidationMethods();
                $result = $tester->validateTitle("234987239484");
                $this->assertEquals("Invalid", $result);
        }
        
        public function testTitleValidation3(){
                $tester = new ValidationMethods();
                $result = $tester->validateTitle("This is a title!");
                $this->assertEquals("Valid", $result);
        }
        
        public function testTitleValidation4(){
                $tester = new ValidationMethods();
                $result = $tester->validateTitle("I contain letters and numb3r5!");
                $this->assertEquals("Valid", $result);
        }
        
        public function testTitleValidation5(){
                $tester = new ValidationMethods();
                $result = $tester->validateTitle("#$%^&*&^%$#%^&!");
                $this->assertEquals("Invalid", $result);
        }
}
