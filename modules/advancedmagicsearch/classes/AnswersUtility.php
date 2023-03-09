<?php

    class AnswersUtility {
        public static $answersutility = array(
            '1' => array(
                    '1',
                    '2'
            ),

            '2' => array(
                    '3',
                    '4'
            ),

            '3' => array(
                    '5',
                    '6'
            ),

            '4' => array(
                    '7',
                    '8',
                    '9'
            )

        );
    }

    function getQuestionFull($id){
        return $answersutility[$id];
    }   
?>