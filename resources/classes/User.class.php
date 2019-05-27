<?php
class User {
    private $uid;
    private $emri;
    private $mbiemri;
    private $email;
    private $password;
    private $manager;
    function __construct($emri,$mbiemri,$email,$password,$manager)
    {
        $this->uid++;
        $this->emri=$emri;
        $this->mbiemri=$mbiemri;
        $this->email=$email;
        $this->password=$password;
        $this->manager=$manager;
        
    }
    public function getUid()
    {
        return $this->uid;
    }
    public function getEmri()
    {
        return $this->emri;
    }
    public function getMbiemri()
    {
        return $this->mbiemri;
    }
    public function getManager()
    {
        return $this->manager;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setEmri($emri)
    {
        $this->emri=$emri;

    }
    public function setMbiemri($mbiemri)
    {
        $this->mbiemri=$mbiemri;

    }
    public function setEmail($email)
    {
        $this->email=$email;

    }
    public function setPassword($password)
    {
        $this->password=$password;

    }

}

//funksionet ndihmese per databaze

function insertUser($db,$user)
{
    $sql="INSERT INTO user(emri,mbiemri,email,isManager,password) VALUES('{$user->getEmri()}','{$user->getMbiemri()}','{$user->getEmail()}',{$user->getManager()},'{$user->getPassword()}');";
    echo $sql;
   if($db->executeData($sql))
      return true; 

    return false;
}
function updateUser($db,$user,$kolona)
{
    $sql="";
    switch($kolona)
      {
          case 'emri':
                $sql="UPDATE user SET emri='{$user->getEmri()}' WHERE uid={$user->getUid()}";
               $db->executeData($sql);
               break;
          case 'mbiemri':
      $sql="UPDATE user SET mbiemri='{$user->getMbiemri()}' WHERE uid={$user->getUid()}";
               $db->executeData($sql);
               break;
          case 'email':
      $sql="UPDATE user SET email='{$user->getEmail()}' WHERE uid={$user->getUid()}";
               $db->executeData($sql);
               break;
          case 'password':
      $sql="UPDATE user SET password='{$user->getPassword()}' WHERE uid={$user->getUid()}";
               $db->executeData($sql);
               break;
        }
}

function deleteUser($db,$user)
{
$sql="DELETE FROM  user WHERE uid={$user->getUid()}";

    $result=$db->executeData($sql);   
    return $result;
}
function selectUser($db,$user)
{

$sql="SELECT * FROM user WHERE uid={$user->getUid()}";
    $arrayUser=$db->getData($sql);
    return $arrayUser;
}
