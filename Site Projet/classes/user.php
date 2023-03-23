<?php
    class User{

        private $id_;
        private $login_;
        private $password_;
        private $isAdmin_ = false;
        
        public function __construct($id,$login,$password,$isAdmin){
            $this->id_ = $id;
            $this->login_ = $login;
            $this->password_ = $password;
            $this->isAdmin = $isAdmin;
        }

        public function seConnecter($login,$password){
            $requestSql = "SELECT * FROM `User`
                WHERE
                `login` = '".$login."'
                AND
                `password` = '".$password."';";

            $resultat = $GLOBALS["pdo"]->query($requestSql);

            if($resultat->rowCount()>0){
                $_SESSION['connexion']=true;
                $tab = $resultat->fetch();
                return true;
            }else{
                echo "Login ou Password incorrect";
                return false;
            }
        }

        public function seDeconnecter(){
            session_unsset();
            session_destroy();
        }
    }
?>