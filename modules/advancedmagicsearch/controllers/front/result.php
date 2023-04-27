<?php

    class AdvancedMagicSearchResultModuleFrontController extends ModuleFrontController
    {
            
            public function __construct()
            {
                parent::__construct();
            }
    
            public function init()
            {
                parent::init();
            }
    
            public function initContent()
            {
                $questionarray = array();
                $answerarray = array();

                foreach($_POST as $key => $value){
                    if(str_contains($key, 'group_')){
                        $questionarray[] = explode('group_', $key)[1];
                        $answerarray[] = $value;
                    }
                }

                parent::initContent();
                $this->setTemplate('module:advancedmagicsearch/views/templates/front/result.tpl');
            }
    }

?>