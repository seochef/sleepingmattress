<?php
    require(_PS_MODULE_DIR_.'advancedmagicsearch/classes/AnswersUtility.php');
    require(_PS_MODULE_DIR_.'advancedmagicsearch/classes/Questions.php');
    require(_PS_MODULE_DIR_.'advancedmagicsearch/classes/Answers.php');

    class AdvancedMagicSearchSmarttressModuleFrontController extends ModuleFrontController
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
            $answersutility = AnswersUtility::getAllQuestion();
            $this->context->smarty->assign("answersutility", $answersutility);

            $answers = Answers::getAllAnswers();
            $this->context->smarty->assign("answers", $answers);

            $questions = Questions::getAllQuestion();
            $this->context->smarty->assign("questions", $questions);

            parent::initContent();
            $this->setTemplate('module:advancedmagicsearch/views/templates/front/smarttress.tpl');
        }
    }
?>