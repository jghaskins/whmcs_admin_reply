<?php
if (!defined('WHMCS'))
	die('This file cannot be accessed directly');

// Convert ticket id to tid
function id_to_tid($id) {
  $table = "tbltickets";
  $fields = "tid";
  $where = array("id"=>$id);
  $result = select_query($table,$fields,$where);
  $data = mysql_fetch_array($result);
  return $data['tid'];
}

function admin_reply_notification_hook_admin_reply($vars) {
  $command = 'sendadminemail';
  $adminuser = 'admin';
  $values['messagename'] = 'Support Ticket Response';
  $values['mergefields'] = array(
    'ticket_id' => $vars['ticketid'],
    'ticket_tid' => id_to_tid($vars['ticketid']),
    'admin' => $vars['admin'],
    'ticket_department' => $vars['deptname'],
    'ticket_subject' => $vars['subject'],
    'ticket_priority' => $vars['priority'],
    'ticket_message' => nl2br($vars['message']));
  $values['type'] = 'support';
  $values['deptid'] = $vars['deptid'];
  
 
  $results = localAPI($command,$values,$adminuser); 
  logActivity($vars['admin'] . ' attempted to notify admins of reply to ticket #'.$vars['ticketid'].'; result: '.print_r($results, true). "; values: ".print_r($values, true));  
}

add_hook('TicketAdminReply',1,'admin_reply_notification_hook_admin_reply');


?>
