Hello from custom block ! 

Use <code>{literal} {$block} Variable {/literal}</code>

<div class="row devblockconf text-center">
  <div class="col-md-12">
    {$block.settings.html nofilter}
  </div>
  <div class="col-md-12">
    {if $block.settings.use_image}
      <img width="100px" src="{$block.settings.image_1.url}" alt="Image">
    {/if}
  </div>
</div>
