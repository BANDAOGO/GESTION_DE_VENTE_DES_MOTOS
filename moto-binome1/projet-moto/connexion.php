<?php 
function bdd()
{
    try
    {
        $db= new PDO('mysql:host=localhost;dbname=bd_moto','root','');
    } 
    catch (Exception $e)
    {
        $e->getMessage();
    }
    return $db;
}
