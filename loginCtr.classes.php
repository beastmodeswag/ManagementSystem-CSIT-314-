<?php

//include "user.classes.php";

//controller class to validate infomration
class LoginCtr
{
  //instance variables
  private $uid;
  private $pwd;

  public function __construct($uid, $pwd)
  {
      $this->uid = $uid;
      $this->pwd = $pwd;
  }

  public function loginUser()
  {
      //create an object of the user class(entity) to access the functions
      $user = new User();
    
      $role = $user->checkUser($this->uid,$this->pwd);

      session_start();
      $_SESSION["log_id"] = $this->uid;

        if($role == 'author')
        {
            //redirect to author page
            header("Location: author/author.php");
        }

        if($role == 'reviewer')
        {
            //redirect to reviewer page
            header("Location: reviewer/reviewer.php");
        }

        if($role == 'admin')
        {
            //redirect to system administrator page
            header("Location: admin/AdminDashboard.php");
        }

        if($role == 'conference_chair')
        {
            //redirect to conference chair page
            header("Location: conference_chair/conference_chair.php");
        }

  }

}

?>