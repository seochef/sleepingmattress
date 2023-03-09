<?php
    class AnswerModel extends ObjectModel {
        
        const TABLE_NAME = _DB_PREFIX_ . 'answers_link';
        public $id_answer;
        public $type;
        public $id_primario;
        public $id_valore;

        public static $definition = array(
            'table' => 'answers_link',
            'primary' => 'id_row',
            'fields' => array(

                'id_row' => array(
                    'type' => self::TYPE_INT,
                    'required' => true
                ),
                
                'id_answer' => array(
                    'type' => self::TYPE_INT,
                    'required' => true
                ),

                'type' => array(
                    'type' => self::TYPE_STRING,
                    'validate' => 'isGenericName',
                    'required' => true
                ),

                'id_primario' => array(
                    'type' => self::TYPE_INT,
                    'required' => true
                ),

                'id_valore' => array(
                    'type' => self::TYPE_INT,
                    'required' => true
                ),
            ),
        );

        public static function getAllRows() {
            $sql = 'SELECT * FROM ' . TABLE_NAME;
            $result = sprint($sql, self::TABLE_NAME);
            return db::getInstance()->executeS($result);
        }

        public function getIdAnswer() {
            return $id_answer;
        }

        public function getType(){
            return $type;
        }

        public function getIdPrimario(){
            return $id_primario;
        }

        public function getIdValore(){
            return $id_valore;
        }
        
        public function setType($n_type){
            $this->type = $n_type;
        }
    
        public function setIdAnswer($n_idAnsewer){
            $this->id_answer = $n_idAnsewer;
        }
        
        public function setIdPrimario($n_idPrimario){
            $this->id_primario = $idPrimario;
        }
    
        public function setIdValore($n_valore){
            $this->id_valore = $n_valore;
        }
    
    }
?>