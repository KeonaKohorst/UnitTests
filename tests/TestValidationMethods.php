<?php

namespace Keonag\UnitTests;

require_once '/home/keonag/unit-tests/src/ValidationMethods.php';

class TestValidationMethods extends \PHPUnit\Framework\TestCase{
        /*
         * Email field validation tests
         */
        public function test_email_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_email("kohorstkeona@outlook.com");
                $this->assertEquals(true, $result);
        }
        
        public function test_email_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_email("kohorstkeona@outlook");
                $this->assertEquals(false, $result);
        }
        
        public function test_email_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_email("kohorst#keona$%");
                $this->assertEquals(false, $result);
        }
        
        
        /*
         * Name field validation tests
         */
        public function test_name_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Keona");
                $this->assertEquals(true, $result);
        }
        
        public function test_name_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("$%^&*(");
                $this->assertEquals(false, $result);
        }
        
        public function test_name_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Keona                 ");
                $this->assertEquals(true, $result);
        }
        
        public function test_name_validation_4(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Elizabeth Joy\n");
                $this->assertEquals(true, $result);
        }
        
        public function test_name_validation_5(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Susan-Anne");
                $this->assertEquals(false, $result);
        }
        
        /*
         * URL field validation tests
         */
        public function test_URL_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("https://www.google.com");
                $this->assertEquals(true, $result);
        }
        
        public function test_URL_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("google.com");
                $this->assertEquals(false, $result);
        }
        
        public function test_URL_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("yahoo");
                $this->assertEquals(false, $result);
        }
        
        public function test_URL_validation_4(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("www.google.com");
                $this->assertEquals(false, $result);
        }
        
        public function test_URL_validation_5(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("https://forums.phpfreaks.com/topic/284903-allow-only-letters-numbers-dash-underscore-or-space/");
                $this->assertEquals(true, $result);
        }
        
        /*
         * Title field validation tests
         */
        public function test_title_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("i am a regular title");
                $this->assertEquals(true, $result);
        }
        
        public function test_title_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("234987239484");
                $this->assertEquals(false, $result);
        }
        
        public function test_title_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("This is a title!");
                $this->assertEquals(true, $result);
        }
        
        public function test_title_validation_4(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("I contain letters and numb3r5!");
                $this->assertEquals(true, $result);
        }
        
        public function test_title_validation_5(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("#$%^&*&^%$#%^&!");
                $this->assertEquals(false, $result);
        }
        
        /*
         * Description validation tests
         */
        public function test_desc_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_description("#$%^&*&^%$#%^&!");
                $this->assertEquals(false, $result);
        }
        
        public function test_desc_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_description("Normal description!");
                $this->assertEquals(true, $result);
        }
        
        public function test_desc_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_description("            ");
                $this->assertEquals(false, $result);
        }
        
        /*
         * Test contains letters
         */
        public function test_contains_letters(){
                $tester = new ValidationMethods();
                $result = $tester->contains_letters("            ");
                $this->assertEquals(false, $result);
        }
        
        public function test_contains_letters_2(){
                $tester = new ValidationMethods();
                $result = $tester->contains_letters("abcdefg234hijklmnop");
                $this->assertEquals(true, $result);
        }
        
        public function test_contains_letters_3(){
                $tester = new ValidationMethods();
                $result = $tester->contains_letters("#$%^&*(");
                $this->assertEquals(false, $result);
        }
        
        /*
         * Test sanitize string
         */
        public function test_sanitize_string(){
                $tester = new ValidationMethods();
                $result = $tester->sanitize_string("      name      ");
                $this->assertEquals("Name", $result);
        }
        
        public function test_sanitize_string_2(){
                $tester = new ValidationMethods();
                $result = $tester->sanitize_string("   ");
                $this->assertEquals("", $result);
        }
        
        public function test_sanitize_string_3(){
                $tester = new ValidationMethods();
                $result = $tester->sanitize_string("\n\n\t\r YO");
                $this->assertEquals("Yo", $result);
        }
        
        public function test_sanitize_string_4(){
                $tester = new ValidationMethods();
                $result = $tester->sanitize_string("two   words");
                $this->assertEquals("Two Words", $result);
        }
        
        /*
         * Test only letters
         */
        public function test_only_letters(){
                $tester = new ValidationMethods();
                $result = $tester->only_letters("asdfghjk");
                $this->assertEquals(true, $result);
        }
        
        public function test_only_letters_2(){
                $tester = new ValidationMethods();
                $result = $tester->only_letters("");
                $this->assertEquals(false, $result);
        }
        
        public function test_only_letters_3(){
                $tester = new ValidationMethods();
                $result = $tester->only_letters("\n\n\t\r YO");
                $this->assertEquals(false, $result);
        }
}
