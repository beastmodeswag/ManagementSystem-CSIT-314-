<?php

include "Admin.classes.php";

class AdminViewUserCtr
{
    //view users
    public function viewAll()
    {
        //create Admin User
        $admin = new Admin();
        
        //call view functions in admin class
        $output = $admin->getAll();
        
        //returns array of users and details
        return $output;
    }

}
    
?>