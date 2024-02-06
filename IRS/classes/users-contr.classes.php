<?php

class UserContr extends User
{
    private $email;
    private $pass;
    private $repeatpass;

    public function __construct($email, $pass , $repeatpass) 
    {
        $this->email = $email;
        $this->pass = $pass;
        $this->repeatpass = $repeatpass;
    }

    public function signupUser() 
    {
        if($this-> emptyInputSignup() == false) {
            header("location: index.php?error=empty");
            exit();        
        }
        if($this-> passMatch() == false) {
        header("location: index.php?error=passwordmatch");
        exit();        
        }
        $this->setUser($this->email,$this->pass);
    }

    private function emptyInputSignup()
    {
        $result = false;
        if(empty($this->email) || empty($this->pass) || empty($this->repeatpass)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        //not used yet
    }

    private function passMatch()
    {
        $result = false;
        if ($this->pass !== $this->repeatpass){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    /* not used yet
    private function emailMatch(){
        $result = false;
        if (!$this->checkUser($this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    */
    public function loginUser() 
    {
        if($this-> emptyInputLogin() == false) {
            header("location: index.php?error=empty");
            exit();        
        }
        $this->getUser($this->email,$this->pass);
    }

    private function emptyInputLogin()
    {
        $result = false;
        if(empty($this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}