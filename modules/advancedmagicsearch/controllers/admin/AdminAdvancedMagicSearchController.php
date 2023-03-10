<?php 
    
    class AdminAdvancedMagicSearchController extends AdminController {
        public function __construct () {
            $this->context = Context::getContext();
            $this->bootstrap = true;
            parent::__construct();
        }
        
        public function initContent(){
            $this->content .= $this->context->smarty->fetch(_PS_MODULE_DIR_ . 'advancedmagicsearch/views/templates/admin/answers_link.tpl');
            $answare = Questions::getAllQuestion();
            $this->content->smarty->assign(array('content' => $this->content));
        }
    }


?>