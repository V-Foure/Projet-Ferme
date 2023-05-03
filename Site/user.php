<?php
    class User{

        private $id_;
        private $login_;
        private $password_;
        
        public function __construct($id,$login,$password){
            $this->id_ = $id;
            $this->login_ = $login;
            $this->password_ = $password;
        }

        public function seConnecter($login,$password){
            $requestSql = "SELECT * FROM `user`
                WHERE
                `login` = '".$login."'
                AND
                `password` = '".$password."';";
        
            $resultat = $GLOBALS["pdo"]->query($requestSql);

            if($resultat->rowCount()>0){
                $_SESSION['connexion']=true;
                return true;
            }else{
                return false;
            }
        }

        public function seDeconnecter(){
            session_unset();
            session_destroy();
        }
    }
?>