<?php
if(empty($_SESSION['admin_username']))
{
    header("Location:index.php");
}
