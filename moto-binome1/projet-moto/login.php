<?php

 function verif()
{
$bd=bdd();
if(isset($_POST['user']) and isset($_POST['pwd']))
{
    $user=htmlspecialchars($_POST['user']);
    $pwd=htmlspecialchars($_POST['pwd']);

        $requette=$bd->prepare('SELECT * FROM compte WHERE login =:user AND password =:pwd');
        $requette->execute(array('user'=>$user, 'pwd'=>$pwd));
        $rep=$requette->fetch();
        if($rep)
        {
            return 'ok';
        }
        else
        {
            $erreur="mot de passe ou nom d'utilisateur incorect";
            return $erreur;
        }
}    
}

?>

