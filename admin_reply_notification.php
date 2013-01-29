<?php

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

/*
**********************************************

         *** Admin reply notification ***

This addon module adds notification of 
admin replies to tickets.  When an admin
replies to a ticket, it is emailed to 
all mmembers of the department the ticket
is assigned to.

**********************************************
*/

function admin_reply_notification_config() {
    $configarray = array(
    "name" => "Admin reply notification",
    "description" => "Sends admin replies to support tickets to all department members",
    "version" => "1.0",
    "author" => "Joe Haskins",
    "language" => "english",
    );
    return $configarray;
}
?>