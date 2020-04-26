<?php
error_reporting(E_ALL);
function chargeClasse($classe){
  require "../controleurs/class/".$classe.".class.php";
}
spl_autoload_register('chargeClasse');
