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
        }

        public function getAllPoulet(){
            $ListPoulets = array();

            $requestSql = "SELECT * FROM `poulet`";
            
            $resultat = $GLOBALS["pdo"]->query($requestSql);

            while($tab=$resultat->fetch()){
                $lepoulet = new Poulet($tab['id'],$tab['poids'],$tab['age'],$tab['etat'],$tab['marquage']);
                array_push($ListPoulets,$lepoulet);
            }

            return $ListPoulets;
        }
        
        public function lastInsertId(){

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
            if(is_null($this->id_)){
                $requestSql = "INSERT INTO `poulet` (`poids`,`age`) VALUES ('".$this->poids_."','".$this->age_."')";

                $resultat = $GLOBALS["pdo"]->query($requestSql);
                $this->id_ = $GLOBALS["pdo"]->lastInsertId();
            }else{
                //UPDATE
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
    }
?>