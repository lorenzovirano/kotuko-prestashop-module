<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Kotuko extends Module{
    public function __construct(){
        $this->name = 'kotuko';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Lorenzo Virano';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Kotuko data module');
        $this->description = $this->l('Module that allow to store specfic informations about the user, such as size, shoes number etc...');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('KOTUKO_MODULE')) {
            $this->warning = $this->l('No name provided');
        }
    }

    // When you install the module the block is displayed in the user's personal data form
    public function install(){
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
    
        
       return (
            parent::install() 
            && $this->registerHook('displayCustomerAccountForm')
        ); 
    }

    public function uninstall(){
        return (
            parent::uninstall() 
            && Configuration::deleteByName('KOTUKO_MODULE')
        );
    }

    public function hookDisplayCustomerAccountForm($params){
        $trouserSize = ['38', '40', '42', '44', '46', '48', '50', '52', '54', '56', '58', '60'];
        $tshirtSize = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

        $this->context->smarty->assign('trouserSize', $trouserSize);
        $this->context->smarty->assign('tshirtSize', $tshirtSize);

        // Return the template of inputs
        return $this->display(__FILE__, 'views/templates/user_data_template.tpl');
    }
}