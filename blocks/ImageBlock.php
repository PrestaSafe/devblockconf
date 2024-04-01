<?php 
/**
 * Copyright (c) Since 2020 PrestaSafe and contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to contact@prestasafe.com so we can send you a copy immediately.
 *
 * @author    PrestaSafe <contact@prestasafe.com>
 * @copyright Since 2020 PrestaSafe and contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaSafe
 */

use PrestaSafe\PrettyBlocks\Interfaces\BlockInterface;

class ImageBlock implements BlockInterface
{
    private $module;
    
    public function __construct($module)
    {
        $this->module = $module;
    }


    public function registerBlocks(): array
    {
        $context = \Context::getContext();
        return [
            'name' => $this->module->l('Custom Image Blocks'),
            'description' => $this->module->l('Display image anywhere'), 
            'code' => 'image_block', // unique code 
            'tab' => 'general', // for future use
            'icon' => 'PhotoIcon', // heroicons v2
            // 'icon_path' => 'https://yoursite.com/img/icon.png', // custom icon
            'insert_default_values' => true, // insert default values on new block
            'need_reload' => false, // reload iframe on save
            'templates' => [ // templates for block
                'default' => 'module:' . $this->module->name . '/views/templates/blocks/image_block.tpl', // default template required
                // 'img_left' => 'module:' . $this->module->name . '/views/templates/blocks/custom_block_img_left.tpl',
                // 'full' => 'module:' . $this->module->name . '/views/templates/blocks/img_full.tpl',
                // 'extra' => 'module:' . $this->module->name . '/views/templates/blocks/extra.tpl',
            ],
            'config' => [
                'fields' => [
                   
                    'image' => [
                        'type' => 'fileupload',
                        'force_default_value' => true,
                        'label' => $this->module->l('Image'),
                        'path' => '$/modules/'.$this->module->name.'/views/images/',
                        'default' => [
                            'url' => 'https://placehold.co/600x400',
                        ],
                    ],

                ],
            ],

        ];  
    }
}