<?php

include "Admin.classes.php";

    class AdminCreateUserCtr
    {
        //create users
        public function validateCreate($uid, $pwd, $role)
        {
            //store message to output(success or fail)
            $message = '';

            //trim whitespaces on right and left of string
            $uid = trim($uid);
            $pwd = trim($pwd);
            $role = trim($role);

            //call entity to create user
            //create admin object
            $admin = new Admin();

            $output = $admin->createUser($uid, $pwd, $role);

            if($output === TRUE)
            {
                $message = 'Account created Successfully.';
            }
            else
            {
                $message = 'Account creation failed.';
            }
            return $message;
        }

    }
?>