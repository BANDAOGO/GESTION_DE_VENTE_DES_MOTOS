<?php
error_reporting(E_ALL);
function autoloard($class)
{
    require "class/".$class.".class.php";
}
spl_autoload_register('autoloard');