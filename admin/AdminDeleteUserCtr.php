<?php

include "Admin.classes.php";

    class AdminDeleteUserCtr
    {
        //create users
        public function validateDelete($uid)
        {
            $message = '';

            //create admin object
            $admin = new Admin();

            //call delete function from admin class(entity)
            $output = $admin->deleteUser($uid);

            if($output === TRUE)
            {
                $message = 'Account deleted Successfully.';
            }
            else
            {
                $message = 'Account does not exists.';
            }
            return $message;
        }

    }
?>