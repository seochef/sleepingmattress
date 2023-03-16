<?php

    class Questions {
        public static $questions = array(
            '1' => 'Preferisci un materasso più morbido e soffice oppure più rigido?',
            '2' => 'Preferisci un letto singolo o un letto matrimoniale?',
            '3' => 'Soffri di allergie?',
            '4' => 'Quanto spenderesti per l acquiato del materasso '
        );

        public static function getQuestion($id) {
            return self::$questions[$id];
        }
    
        public static function getAllQuestion(){
            return self::$questions;
        }
    }
?>