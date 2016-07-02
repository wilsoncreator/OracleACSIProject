<?php

class utilisateur
{
    var $id;
    var $nom;
    var $prenom;
    var $mail;
    var $civilite;
    var $datenaissance;
    var $login;
    var $password;

    /**
     * utilisateur constructor.
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $civilite
     * @param $datenaissance
     * @param $login
     * @param $password
     */
    public function __construct($nom, $prenom, $mail, $civilite, $datenaissance, $login, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->civilite = $civilite;
        $this->datenaissance = $datenaissance;
        $this->login = $login;
        $this->password = $password;
    }

    function addUtilisateur($nom, $prenom, $mail, $civilite, $datenaissance, $login, $password ){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO utilisateur (nom_usr,prenom_usr,mail_usr,civilite_usr,date_naiss_usr,login,password) VALUES ('".$nom."','".$prenom."','".$mail."','".$civilite."','".$datenaissance."','".$login."','".$password."')");
    }

    function getUtilisateurById($id){
        $bdd = connexion_db::getInstance();
        $req = $bdd->query("SELECT * FROM utilisateur WHERE id_usr = '.$id.'");
        $user = $req->fetch();
        $utilisateur = new utilisateur($user['nom_usr'],$user['prenom_usr'],$user['mail_usr'],$user['civilite_usr'],$user['date_usr'],$user['login'],$user['password']);
        return $utilisateur;
    }

}