<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class CombinationSearch extends Module
{
    public function __construct()
    {
        $this->name = 'combinationsearch';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'YourName';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Combination Search', [], 'Modules.Combinationsearch.Admin');
        $this->description = $this->trans('Adds a search field to filter combinations by attribute values in the product edit page.', [], 'Modules.Combinationsearch.Admin');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayAdminProductsCombinationBottom') && $this->registerHook('actionAdminControllerSetMedia');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayAdminProductsCombinationBottom($params)
    {
        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/filter.tpl');
    }

    public function hookActionAdminControllerSetMedia()
    {
        if (Tools::getValue('controller') == 'AdminProducts') {
            $this->context->controller->addJS($this->_path . 'views/js/admin.js');
        }
    }
}
