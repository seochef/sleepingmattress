<?php

    class Answers {
            public static $answers = array(
                '1' => 'Soffice',
                '2' => 'Rigido',
                '3' => 'Singolo',
                '4' => 'Matrimoniale',
                '5' => 'Si, soffro di allergie',
                '6' => 'No, non soffro di allergie',
                '7' => '0/500 €',
                '8' => '500/1000 €',
                '9' => 'Il prezzo è indifferente'
            );

            public static function getAnswer($id) {
                return self::$answers[$id];       
            }
            
            public static function getAllAnswers(){
                return self::$answers;
            }
        }
?>