<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Advancedmagicsearch extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'advancedmagicsearch';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'B8ne, Alepnc, AntonioCasoria';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Advanced Magic Search');
        $this->description = $this->l('Advanced Magic Search for Sleepingmattress!');

        $this->confirmUninstall = $this->l('Sei sicurio di voler disinstallare il modulo?');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('ADVANCEDMAGICSEARCH_LIVE_MODE', false);

        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('displayHeader') &&
            $this->buildTabs();
    }

    public function uninstall()
    {
        Configuration::deleteByName('ADVANCEDMAGICSEARCH_LIVE_MODE');

        include(dirname(__FILE__).'/sql/uninstall.php');

        $this->removeTabs();
        return parent::uninstall();
    }

      

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitAdvancedmagicsearchModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitAdvancedmagicsearchModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'ADVANCEDMAGICSEARCH_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'ADVANCEDMAGICSEARCH_LIVE_MODE' => Configuration::get('ADVANCEDMAGICSEARCH_LIVE_MODE', true),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addCSS($this->_path.'views/assets/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/assets/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/assets/css/front.css');
    }

    public function hookDisplayHeader()
    {
        /* Place your code here. */
    }

    private function buildTabs()
    {
        $class_name = 'AdminParentModulesSf';

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminAdvancedMagicSearch';
        $tab->module = $this->name;
     
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Advanced Magic Search';
        }
     
        $tab->id_parent = (int)Tab::getIdFromClassName($class_name);
        $tab->add();
    }

    private function removeTabs()
    {
        $tab = new Tab((int)Tab::getIdFromClassName('AdminAdvancedMagicSearch'));
        if($tab->id){
            $tab->delete();
        }
    }
}
