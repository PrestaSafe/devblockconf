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

class CustomBlock implements BlockInterface
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
            'name' => $this->module->l('Custom Parralax'),
            'description' => $this->module->l('Display custom text anywhere'), 
            'code' => 'demo_block', // unique code 
            'tab' => 'general', // for future use
            'icon' => 'DocumentTextIcon', // heroicons v2
            // 'icon_path' => 'https://yoursite.com/img/icon.png', // custom icon
            'insert_default_values' => true, // insert default values on new block
            'need_reload' => false, // reload iframe on save
            'templates' => [ // templates for block
                'default' => 'module:' . $this->module->name . '/views/templates/blocks/custom_block.tpl', // default template required
                'img_left' => 'module:' . $this->module->name . '/views/templates/blocks/custom_block_img_left.tpl',
                'full' => 'module:' . $this->module->name . '/views/templates/blocks/img_full.tpl',
                'extra' => 'module:' . $this->module->name . '/views/templates/blocks/extra.tpl',
            ],
            'config' => [
                'fields' => [
                    'category' => [
                        'type' => 'selector',
                        'label' => $this->module->l('Category'),
                        'collection' => 'Category',
                        'selector' => '{id} - {name}',
                        'force_default_value' => true,
                        'default' => \HelperBuilder::getRandomCategory($context->language->id, $context->shop->id),
                    ],
                    'text' => [
                        'type' => 'text',
                        'force_default_value' => true,
                        'label' => $this->module->l('Add your text'),
                        'default' => 'Hello everyone',
                    ],
                    'html' => [
                        'type' => 'editor',
                        'force_default_value' => true,
                        'label' => $this->module->l('Add your text'),
                        'default' => '<p> Hello everyone</p>'
                    ],
                    'image_1' => [
                        'type' => 'fileupload',
                        'force_default_value' => true,
                        'label' => $this->module->l('Image first banner'),
                        'path' => '$/modules/'.$this->module->name.'/views/images/',
                        'default' => [
                            'url' => 'https://placehold.co/600x400',
                        ],
                    ],
                    'use_image' => [
                        'type' => 'checkbox',
                        'label' => $this->module->l('Use image'),
                        'default' => true,
                        'force_default_value' => true,
                    ],

                    'title_field' => [
                        'type' => 'title',
                        'label' => $this->module->l('Title'),
                        'force_default_value' => true,
                        'default' => [
                            'tag' => 'h2',
                            'classes' => [],
                            'value' => "EDIT THIS TITLE !",
                            'focus' => false,
                            'bold' => false,
                            'italic' => false,
                            'underline' => false,
                            'size' => 18,
                        ],
                    ],
                    'alignment' => [
                        'type' => 'select',
                        'label' => $this->module->l('Choose alignment'),
                        'default' => 'left',
                        'choices' => [
                            'left' => 'left',
                            'center' => 'center',
                            'right' => 'right',
                        ],
                    ],
                    // 'multiselect' => [
                    //     'type' => 'multiselect',
                    //     'label' => $this->l('Multiple select'),
                    //     'default' => ["1","2"],
                    //     'force_default_value' => true, // force default value
                    //     'choices' => [
                    //         '1' => 'Select 1',
                    //         '2' => 'Select 2',
                    //         '3' => 'Select 3',
                    //         '4' => 'Select 4',
                    //         '5' => 'Select 5',
                    //     ],
                    // ],
                    // 'radio_group' => [
                    //     'type' => 'radio_group', // type of field
                    //     'label' => 'Choose a value',  // label to display
                    //     'force_default_value' => true, // force default value
                    //     'default' => '3', // default value (String)
                    //     'choices' => [
                    //         '1' => 'Radio 1',
                    //         '2' => 'Radio 2',
                    //         '3' => 'Radio 3',
                    //         '4' => "Radio '4",
                    //     ]
                    // ],
                    // multiselect 
                    'alignment' => [
                        'type' => 'select',
                        'label' => $this->module->l('Choose alignment'),
                        'default' => 'left',
                        'choices' => [
                            'left' => 'left',
                            'center' => 'center',
                            'right' => 'right',
                        ],
                    ],
                ],
            ],

            'repeater' => [
                'name' => $this->module->l('Repeated Element'),
                'nameFrom' => 'text_field',
                'groups' => [
                    'image_field' => [
                        'type' => 'fileupload',
                        'force_default_value' => true,
                        'label' => $this->module->l('Upload Image'),
                        'path' => '$/modules/'.$this->module->name.'/views/images/',
                        'default' => [
                            'url' => 'https://placehold.co/600x400',
                        ],
                    ],
                    'text_field' => [
                        'type' => 'text',
                        'force_default_value' => true,
                        'label' => $this->module->l('Enter Text'),
                        'default' => 'Default Text',
                    ],
                ],
            ],
        ];  
    }
}