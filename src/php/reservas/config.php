<?php 

if(session_status() == PHP_SESSION_NONE)//php 5.5 above only lower version not working
{
	session_start();//start session if session not start
}//end if

require_once('database/Database.php');//database 

 ?>