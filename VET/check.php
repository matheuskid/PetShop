<?php
 
require_once 'init.php';
 
if (!isLoggedIn())
{
    header('Location: loginvet.php');
}
