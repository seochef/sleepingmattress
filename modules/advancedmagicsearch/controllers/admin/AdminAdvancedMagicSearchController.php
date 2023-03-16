<?php  
    require_once(_PS_MODULE_DIR_ . 'advancedmagicsearch/classes/Answers.php');
    require_once(_PS_MODULE_DIR_ . 'advancedmagicsearch/classes/AnswerModel.php');
    
    class AdminAdvancedMagicSearchController extends AdminController {
        public function __construct () {
            $this->context = Context::getContext();
            $this->bootstrap = true;
            parent::__construct();
        }
        
        public function initContent(){
            $this->smartyAssign();
            $this->displayContent();
        }

        private function displayContent() {
            $this->content .= $this->context->smarty->fetch(_PS_MODULE_DIR_ . 'advancedmagicsearch/views/templates/admin/answers_link.tpl');
            $this->context->smarty->assign(array('content' => $this->content));
        }

        private function smartyAssign() {
            $answers = Answers::getAllAnswers();
            $this->context->smarty->assign("answers", $answers);

            $adminlink = $this->context->link->getAdminLink('AdminAdvancedMagicSearch');
            $this->context->smarty->assign("adminlink", $adminlink);
        }

        public function postProcess() {
            if (Tools::isSubmit('submitAnswers')) {
                $risposta = Tools::getValue('risposte');
                $tipo = Tools::getValue('tipo');
                $idPrimario = Tools::getValue('id_primario');
                $idValore = Tools::getValue('id_valore');
                
                $answerModel = new AnswerModel();

                $answerModel->setIdAnswer($risposta);
                $answerModel->setType($tipo);
                $answerModel->setIdPrimario($idPrimario);
                $answerModel->setIdValore($idValore);
                $controllo = $answerModel->save();
                $this->context->smarty->assign("result_form", $controllo);
            }
         }
    }


?>