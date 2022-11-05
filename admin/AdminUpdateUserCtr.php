<?php

include "Admin.classes.php";

    class AdminUpdateUserCtr
    {
        public function validateUpdate($uid, $pwd, $role)
        {
            $message = '';
    
            //trim whitespaces on right and left of string
            $uid = trim($uid);
            $pwd = trim($pwd);
            $role = trim($role);

            $admin = new Admin();
    
            # ? $output = $admin->searchUser($uid); ?
    
            
            $output = $admin->updateUser($uid, $pwd, $role);
    
            if($output === TRUE)
            {
                $message = 'Account details have been updated.';
            }
            else
            {
                $message = 'Update failed.';
            }
    
            return $message;
        }

    }
?>