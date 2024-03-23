<?php

namespace Keonag\UnitTests;

require_once '/home/keonag/unit-tests/src/ValidationMethods.php';

/*
 * run the tests command:
 * 
 * ./vendor/bin/phpunit tests/TestValidationMethods.php

 */

class TestValidationMethods extends \PHPUnit\Framework\TestCase{
        /*
         * Email field validation tests
         */
        public function test_email_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_email("kohorstkeona@outlook.com");
                $this->assertTrue($result);
        }
        
        public function test_email_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_email("kohorstkeona@outlook");
                $this->assertFalse($result);
        }
        
        public function test_email_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_email("kohorst#keona$%");
                $this->assertFalse($result);
        }
        
        
        /*
         * Name field validation tests
         */
        public function test_name_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Keona");
                $this->assertTrue($result);
        }
        
        public function test_name_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("$%^&*(");
                $this->assertFalse($result);
        }
        
        public function test_name_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Keona                 ");
                $this->assertTrue($result);
        }
        
        public function test_name_validation_4(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Elizabeth Joy\n");
                $this->assertTrue($result);
        }
        
        public function test_name_validation_5(){
                $tester = new ValidationMethods();
                $result = $tester->validate_name("Susan-Anne");
                $this->assertFalse($result);
        }
        
        /*
         * URL field validation tests
         */
        public function test_URL_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("https://www.google.com");
                $this->assertTrue($result);
        }
        
        public function test_URL_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("google.com");
                $this->assertFalse($result);
        }
        
        public function test_URL_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("yahoo");
                $this->assertFalse($result);
        }
        
        public function test_URL_validation_4(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("www.google.com");
                $this->assertFalse($result);
        }
        
        public function test_URL_validation_5(){
                $tester = new ValidationMethods();
                $result = $tester->validate_URL("https://forums.phpfreaks.com/topic/284903-allow-only-letters-numbers-dash-underscore-or-space/");
                $this->assertTrue($result);
        }
        
        /*
         * Title field validation tests
         */
        public function test_title_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("i am a regular title");
                $this->assertTrue($result);
        }
        
        public function test_title_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("234987239484");
                $this->assertFalse($result);
        }
        
        public function test_title_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("This is a title!");
                $this->assertTrue($result);
        }
        
        public function test_title_validation_4(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("I contain letters and numb3r5!");
                $this->assertTrue($result);
        }
        
        public function test_title_validation_5(){
                $tester = new ValidationMethods();
                $result = $tester->validate_title("#$%^&*&^%$#%^&!");
                $this->assertFalse($result);
        }
        
        /*
         * Description validation tests
         */
        public function test_desc_validation(){
                $tester = new ValidationMethods();
                $result = $tester->validate_description("#$%^&*&^%$#%^&!");
                $this->assertFalse($result);
        }
        
        public function test_desc_validation_2(){
                $tester = new ValidationMethods();
                $result = $tester->validate_description("Normal description!");
                $this->assertTrue($result);
        }
        
        public function test_desc_validation_3(){
                $tester = new ValidationMethods();
                $result = $tester->validate_description("            ");
                $this->assertFalse($result);
        }
        
        /*
         * Test contains letters
         */
        public function test_contains_letters(){
                $tester = new ValidationMethods();
                $result = $tester->contains_letters("            ");
                $this->assertEquals(0, $result);
        }
        
        public function test_contains_letters_2(){
                $tester = new ValidationMethods();
                $result = $tester->contains_letters("abcdefg234hijklmnop");
                $this->assertEquals(1, $result);
        }
        
        public function test_contains_letters_3(){
                $tester = new ValidationMethods();
                $result = $tester->contains_letters("#$%^&*(");
                $this->assertEquals(0, $result);
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
                $this->assertTrue($result);
        }
        
        public function test_only_letters_2(){
                $tester = new ValidationMethods();
                $result = $tester->only_letters("");
                $this->assertFalse($result);
        }
        
        public function test_only_letters_3(){
                $tester = new ValidationMethods();
                $result = $tester->only_letters("\n\n\t\r YO");
                $this->assertFalse($result);
        }
}
