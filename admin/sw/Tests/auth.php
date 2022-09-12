<?php
    namespace tests;
    
    use PHPUnit\Framework\TestCase;
    use SWServices\Authentication\AuthenticationService as AuthenticationService;
    use Exception;

    final class AuthTests extends TestCase{
        public function testSuccess(){
            $params = array(
				"url"=>"https://cliente.smartweb.com.mx",
				"user"=>"facturacion@competro.mx",
				"password"=> "cPr/123*226"
			);
            $authenticate = AuthenticationService::auth($params);
            $result = $authenticate::Token();
            $result->status;
                  
            $this->assert($result->status, "success");
        }
        public function testError(){
            $this->expectException(Exception::class);
            AuthenticationService::auth('');
            
        }
         
    }




?>