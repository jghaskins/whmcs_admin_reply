whmcs_admin_reply
=================
Description
-----------
Web Host Manager Complete Solution addon to email all department members a copy of the response when a ticket is repsonded to.

Installation
------------
Create an admin_reply_notification folder in the modules/addons folder under the WHMCS directory & copy all of the files to that folder.  Then activate as normal through the admin area.  

Notes
-----
Although optional, it is recommended that if youe have a line like this in your "Support Ticket Response" template:

`Client: {$client_name}{if $client_id} #{$client_id}{/if}`

you replace it with this (adjusting for any differences in your template):

`{if $client_name}Client: {$client_name}{if $client_id} #{$client_id}{/if}{/if}{if $admin}Admin: {$admin}{/if}`
