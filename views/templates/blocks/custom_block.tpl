<div {if $block.settings.default.container} class="container" {/if}>


  Use <code>{literal} {$block} Variable {/literal}</code>
  <p>
    Value of image block is <code>{literal} {$block.settings.image_1.url} {/literal} = {$block.settings.image_1.url} </code> 
  </p>

  <p>
    Value of editor block is <code>{literal} {$block.settings.html nofilter} {/literal} = {$block.settings.html nofilter} </code> 
  </p>


  <p>
    Value of use_image is <code>{literal} {$block.settings.use_image} {/literal} = {dump($block.settings.use_image)} </code> 
  </p>


<div class="text-center py-3 my-3">
  {prettyblocks_title block=$block field="title_field" classes=['h3', 'text-center', 'pb-4']} 
</div>


<div class="devblockconf p-3">
This block use CSS COMPILED
</div>

  <hr>

  Default settings: 


  <code>
    Value of bg color: <code>{literal} {$block.settings.default.bg_color} {/literal} = {dump($block.settings.default.bg_color)} </code> 
    {if $block.settings.default.bg_color}<span style="background-color: {$block.settings.default.bg_color};">&nbsp;&nbsp;&nbsp;&nbsp;</span>{/if}
    Value of container: <code>{literal} {$block.settings.default.container} {/literal} = {dump($block.settings.default.container)} </code>
  </code>

  <hr>

  Repeated elements: 
  <code>{literal} {$block.states} {/literal} = {dump($block.states)} </code>

</div>