
<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

class DevBlockConf extends Module
{
    protected $templateFile;
    public $hooks = [
        'ActionRegisterThemeSettings',
        'ActionRegisterBlock',
        'ActionQueueSassCompile',
        'beforeRenderingDemoBlock',
        'displayHeader',
    ];
    public function __construct()
    {
        $this->name = 'devblockconf';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'PrestaSafe';
        $this->dependencies = ['prettyblocks'];
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('DEV BLOCK');
        $this->description = $this->l('Demo block for prettyblocks');
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
    }
    

    public function install()
    {
        parent::install();
        $this->registerHook($this->hooks);

        return true;
    }


    public function hookdisplayHeader()
    {
        $shop = $this->context->shop;
        if(file_exists(_PS_THEME_DIR_ . 'assets/css/theme-'.$shop->id.'.css'))
        {
            $this->context->controller->unregisterStylesheet('theme-main');
            $this->context->controller->registerStylesheet('theme-main', 'assets/css/theme-'.$shop->id.'.css', ['media' => 'all', 'priority' => 150]);
        }
    }

   

    public function uninstall()
    {
        return parent::uninstall() && $this->unregisterHook($this->hooks);
    }

    /**
     * Extends block classic featured products
     */
    public function hookbeforeRenderingDemoBlock($params)
    {
        $settings = $params['block']['settings'];

        return ['radom_value' => false];
    }

    public function hookActionRegisterThemeSettings()
    {
        // $logo = HelperBuilder::pathFormattedToUrl('$/modules/'.$this->name.'/views/images/logo/logo-dark.png');

        return [
            'logo' => [
                'type' => 'fileupload', // type of field
                'label' => $this->l('Logo'), // label to display
                'tab' => 'logo',
                'path' => '$/modules/cartzillablocks/views/images/logo/', // path to upload
                'default' => [
                    'url' => $logo,
                ],
            ],
            'color' => [
                'type' => 'color',
                'label' => $this->l('Background color of blocks'),
                'force_default_value' => true,
                'default' => '#f5f5f5',
            ],
        ];
    }

    public function hookActionRegisterBlock()
    {

        return HelperBuilder::renderBlocks(
            [
                new CustomBlock($this),
            ]
        );
    }

    
    


 

    public function hookActionQueueSassCompile($params)
    {
        $id_shop = (int)$params['id_shop'];
        $profile = $params['profile'];

        $vars = [
            'entries' => [
                '$/modules/' . $this->name . '/views/css/custom.scss',
            ],
            'out' => '$/themes/'.$profile->theme_name.'/assets/css/custom.css',
        ];
   
       
       

        return [$vars];
    }


   
}