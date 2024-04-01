
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
    public $hooks = [
        'ActionRegisterBlock',
        'ActionRegisterThemeSettings',
        'ActionQueueSassCompile',
        'beforeRenderingDemoBlock',
        'ActionExtendBlockTemplateDemoBlock',
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
  
    /**
     * Register blocks
     */
    public function hookActionRegisterBlock()
    {

        return HelperBuilder::renderBlocks(
            [
                new CustomBlock($this),
                new ImageBlock($this),
            ]
        );
    }

   

    /**
     * Add settings to theme
     */
    public function hookActionRegisterThemeSettings()
    {
        // $logo = HelperBuilder::pathFormattedToUrl('$/modules/'.$this->name.'/views/images/logo/logo-dark.png');
        // {TplSettings::getSettings('bg_color')}
        return [
            'logo' => [
                'type' => 'fileupload', // type of field
                'label' => $this->l('Logo'), // label to display
                'tab' => 'logo',
                'path' => '$/modules/'.$this->name.'/views/images/logo/', // path to upload
                'default' => [
                    'url' => '',
                ],
            ],
            'bg_color' => [
                'type' => 'color',
                'label' => $this->l('Background color of blocks'),
                'force_default_value' => true,
                'tab' => 'custom',
                'default' => '#f5f5f5',
            ],
            'txt_color' => [
                'type' => 'color',
                'label' => $this->l('Text color of blocks'),
                'force_default_value' => true,
                'tab' => 'custom',
                'default' => '#000000',
            ],
            'parralax_height' => [
                'type' => 'text',
                'label' => $this->l('Height of parralax'),
                'force_default_value' => true,
                'tab' => 'custom',
                'default' => '500px',
            ],
        ];
    }


    /**
     * Extends block classic featured products
     */
    public function hookbeforeRenderingDemoBlock($params)
    {
        // $settings = $params['block']['settings'];
        // $sql = new DbQuery();
        $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        // $block.extra.random_value
        return ['random_value' => $random];
    }

    /**
     * Add settings to theme
     * @param array $params
     * @return array
     */
    public function hookActionQueueSassCompile($params)
    {
        // $id_shop = (int)$params['id_shop'];
        // $profile = $params['profile'];

        $vars = [
            'entries' => [
                '$/modules/' . $this->name . '/views/css/vars.scss',
            ],
            'out' => '$/modules/' . $this->name . '/views/css/devblockconf.scss',
        ];

        $theme = [
            'entries' => [
                '$/modules/' . $this->name . '/views/css/devblockconf.scss',
            ],
            'out' => '$/modules/' . $this->name . '/views/css/devblockconf.css',
        ];
   
        return [$vars, $theme];
    }

    

    /**
     * Add css file
     */
    public function hookdisplayHeader()
    {

        $this->context->controller->registerStylesheet(
            'module-devblockconf-style',
            'modules/'.$this->name.'/views/css/devblockconf.css',
            [
                'media' => 'all',
                'priority' => 200,
            ]
        );

    }
    /**
     * Add template from hook
     * @param array $params
     */
    public function hookActionExtendBlockTemplateDemoBlock($params)
    {
        return [
            'from_hook' => 'module:'.$this->name.'/views/templates/blocks/template1.tpl',
        ];
    }

    /**
     * Uninstall module
     */
    public function uninstall()
    {
        return parent::uninstall() && $this->unregisterHook($this->hooks);
    }
    /**
     * Install module
     */
    public function install()
    {
        parent::install();
        $this->registerHook($this->hooks);

        return true;
    }
   
}