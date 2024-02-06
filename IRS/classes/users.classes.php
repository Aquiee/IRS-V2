<?php

class User extends Dbh
{
    protected function setUser($email , $pass)
    {
        $stmt = $this->connect()->prepare('
            INSERT INTO  users (
                users_email, 
                users_pass
            ) VALUES (?,?);
        ');
        
        $hashedPass = password_hash($pass , PASSWORD_DEFAULT);

        if(!$stmt->execute(array($email,$hashedPass))){
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }

    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('
            SELECT users_email FROM 
                users WHERE 
                users_email = ?;
        ');

        if(!$stmt->execute($email)){
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        } 
        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function getUser($email , $pass)
    {
        if(!$this->isAdmin($email,$pass)){
            $stmt = $this->connect()->prepare('
                SELECT users_pass FROM 
                users 
                WHERE users_email = ?;
        ');
        
            if(!$stmt->execute(array($email))){
                $stmt = null;
                header("location: index.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: homepage.php?error=usersnotfound");
                exit();
            }
    
            $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPass = password_verify($pass,$passHashed[0]["users_pass"]);
    
            if($checkPass == false){
                $stmt = null;
                header("location: homepage.php?error=wrongpassword");
                exit();
            } elseif($checkPass == true){
                $stmt = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ? AND users_pass =?;');
    
                if(!$stmt->execute(array($email,$passHashed[0]["users_pass"]))){
                    $stmt = null;
                    header("location: homepage.php?error=;loginfailed");
                    exit();
                }
                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: homepage.php?error=loginusernotfound");
                    exit();
                }
                    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    session_start();
                    $_SESSION['email'] = $user[0]['users_email'];
                    $stmt = null;
            }
    
            $stmt = null;
        }
    }

    protected function isAdmin($email, $pass) 
    {
        $stmt = $this->connect()->prepare('
            SELECT pass FROM 
                admin_cred 
                WHERE email = ?;
        ');

        if (!$stmt->execute([$email])) {
            $stmt = null;
            return false;
        }

        $passHashed = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($pass, $passHashed['pass'])) {
            session_start();
            $_SESSION['email'] = $email;
            $stmt = null;
            return true;
        }
        $stmt = null;
        return false;
    }
}
