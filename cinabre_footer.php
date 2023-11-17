<?php
/**
* 2007-2023 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2023 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Cinabre_footer extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'cinabre_footer';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Klorel';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Cinabre - Footer');
        $this->description = $this->l('Module de gestion du footer.');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('CINABRE_FOOTER_LIVE_MODE', false);

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayFooter') &&
            $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        Configuration::deleteByName('CINABRE_FOOTER_LIVE_MODE');

        return parent::uninstall();
    }

    public function hookDisplayFooter()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/footer-klorel.css');
        return $this->context->smarty->fetch($this->local_path.'views/templates/hook/footer-klorel.tpl');
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitCinabre_footerModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        return $this->renderForm();
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
        $helper->submit_action = 'submitCinabre_footerModule';
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
                'title' => $this->l('Configuration du footer'),
                'icon' => 'icon-cogs',
                ),
                'tabs' => array(
                    'column_1' => 'Colonne 1',
                    'column_2' => 'Colonne 2',
                    'column_3' => 'Colonne 3',
                    'column_4' => 'Colonne 4',
                ),
                'input' => array(
                    [
                        'col' => 3,
                        'type' => 'text',
                        'tab' => 'column_1',
                        'name' => 'CIN_FOOTER_C1_TITLE',
                        'label' => $this->l('Titre de la colonne'),
                        'lang' => true,
                    ],
                    [
                        'type' => 'textarea',
                        'tab' => 'column_1',
                        'name' => 'CIN_FOOTER_C1_CONTENT',
                        'label' => $this->l('Contenu de la colonne 1'),
                        'autoload_rte' => true,
                        'lang' => true,
                    ],
                    [
                        'col' => 3,
                        'type' => 'text',
                        'tab' => 'column_2',
                        'name' => 'CIN_FOOTER_C2_TITLE',
                        'label' => $this->l('Titre de la colonne'),
                        'lang' => true,
                    ],
                    [
                        'type' => 'textarea',
                        'tab' => 'column_2',
                        'name' => 'CIN_FOOTER_C2_CONTENT',
                        'label' => $this->l('Contenu de la colonne 2'),
                        'autoload_rte' => true,
                        'lang' => true,
                    ],
                    [
                        'col' => 3,
                        'type' => 'text',
                        'tab' => 'column_3',
                        'name' => 'CIN_FOOTER_C3_TITLE',
                        'label' => $this->l('Titre de la colonne'),
                        'lang' => true,
                    ],
                    [
                        'type' => 'textarea',
                        'tab' => 'column_3',
                        'name' => 'CIN_FOOTER_C3_CONTENT',
                        'label' => $this->l('Contenu de la colonne 3'),
                        'autoload_rte' => true,
                        'lang' => true,
                    ],
                    [
                        'col' => 3,
                        'type' => 'text',
                        'tab' => 'column_4',
                        'name' => 'CIN_FOOTER_C4_TITLE',
                        'label' => $this->l('Titre de la colonne'),
                        'lang' => true,
                    ],
                    [
                        'type' => 'textarea',
                        'tab' => 'column_4',
                        'name' => 'CIN_FOOTER_C4_CONTENT',
                        'label' => $this->l('Contenu de la colonne 4'),
                        'autoload_rte' => true,
                        'lang' => true,
                    ],
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
        $languages = Language::getLanguages(false);
        $form_values = [];

        $fields = array(
            'CIN_FOOTER_C1_TITLE',
            'CIN_FOOTER_C1_CONTENT',
            'CIN_FOOTER_C2_TITLE',
            'CIN_FOOTER_C2_CONTENT',
            'CIN_FOOTER_C3_TITLE',
            'CIN_FOOTER_C3_CONTENT',
            'CIN_FOOTER_C4_TITLE',
            'CIN_FOOTER_C4_CONTENT',
        );

        foreach ($fields as $field) {
            foreach ($languages as $language) {
                $form_values[$field][(int)$language['id_lang']] = Configuration::get($field . '_' . (int)$language['id_lang']);
            }
        }

        return $form_values;
    }


    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();
        $languages = Language::getLanguages(false);

        foreach (array_keys($form_values) as $key) {
            foreach ($languages as $language) {
                Configuration::updateValue($key. '_' . (int)$language['id_lang'], Tools::getValue($key. '_' . (int)$language['id_lang']), true);
            }
        }
    }




    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/footer-klorel.css');
        $this->context->controller->addJS($this->_path.'/views/js/footer-klorel.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }
}
