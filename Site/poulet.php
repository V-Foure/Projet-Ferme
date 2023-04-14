<?php
    class Poulet{

        private $id_;
        private $poids_;
        private $age_;
        private $etat_;
        private $marquage_;

        public function __construc($id,$poids,$age,$etat,$marquage){
            $this->id_ = $id;
            $this->poids_ = $poids;
            $this->age_ = $age;
            $this->etat_ = $etat;
            $this->marquage_ = $marquage;
        }

        public function setPouletById($id){
            $requestSql = "SELECT * FROM `poulet`
                WHERE `id` = '".$id."'";
            
            $resultat = $GLOBALS["pdo"]->query($requestSql);
            
            if($resultat->rowCount()>0){
                $tab=$resultat->fetch();
                $this->id_ = $tab['id'];
                $this->poids_ = $tab['poids'];
                $this->age_ = $tab['age'];
                $this->etat_ = $tab['etat'];
                $this->marquage_ = $tab['marquage'];
            }
        }
        

        public function getAllPoulet(){
            $ListPoulets = array();

            $requestSql = "SELECT * FROM `poulet`";
            
            $resultat = $GLOBALS["pdo"]->query($requestSql);

            while($tab=$resultat->fetch()){
                $newpoulet = new Poulet($tab['id'],$tab['poids'],$tab['age'],$tab['etat'],$tab['marquage']);
                array_push($ListPoulets,$newpoulet);
            }

            return $ListPoulets;
        }
        
        public function lastInsertId(){
            //
        }

        public function getId(){
            return $this->id_;
        }
        
        public function getPoids(){
            return $this->poids_;
        }

        public function getAge(){
            return $this->age_;
        }

        public function getEtat(){
            return $this->etat_;
        }

        public function getMarquage(){
            return $this->marquage_;
        }

        public function saveInBDD(){

            $poids = addslashes($this->poids_);
            $age = addslashes($this->age_);
            $etat = addslashes($this->etat_);

            if(is_null($this->id_)){
                $requestSql = "INSERT INTO `poulet` 
                (`poids`,`age`,`etat`)
                VALUES 
                ('".$poids."','".$age."','".$etat."')";

                $resultat = $GLOBALS["pdo"]->query($requestSql);
                $this->id_ = $GLOBALS["pdo"]->lastInsertId();
            }else{
                echo "Tu as mis à jour le poulet n°".$this->id_;

                $requestSql = "UPDATE  `poulet` SET 
                `poids`='".$this->poids_."',
                `age`='".$this->age_."',
                `etat`='".$this->etat_."',
                WHERE `id` ='".$this->id_."'";
                $resultat = $GLOBALS["pdo"]->query($requestSql);
            }
        }

        public function deleteInBDD(){
            if(is_null($this->id_)){
                $requestSql = "DELETE FROM `poulet` 
                WHERE
                id ='".$this->$id_."'";

                $GLOBALS["pdo"]->query($requestSql);
            }
        }

        public function renderHTML(){ 
            $requestSql = "SELECT * FROM `poulet`";
            $resultat = $GLOBALS["pdo"]->query($requestSql);
            
            ?>
                <table align="center" class="text-center">
                    <tr>
                        <th colspan="5">Tableaux des poulets</th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Poids</th>
                        <th>Age</th>
                        <th>Etat</th>
                        <th>Marquage</th>
                    </tr>
            <?php
                if ($resultat->rowCount()>0){
                    foreach ($resultat as $row){  
                        ?>  
                            <tr>            
                                <th><?php echo "".$row['id'].""?></th>
                                <th><?php echo "".$row['poids'].""?></th>
                                <th><?php echo "".$row['age'].""?></th>
                                <th><?php echo "".$row['etat'].""?></th>
                                <th><?php echo "".$row['marquage'].""?></th>
                            </tr>
                        <?php
                    }
                }
            ?>
                </table>
            <?php
        }

        public function setPoids($poids){
            $this->poids_ = $poids;
        }

        public function setAge($age){
            $this->age_ = $age;
        }

        public function setEtat($etat){
            $this->etat_ = $etat;
        }
    }
?>