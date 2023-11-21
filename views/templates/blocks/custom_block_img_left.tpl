Hello from custom block ! 

Use <code>{literal} {$block} Variable {/literal}</code>

<div class="row devblockconf">
  <div class="col-md-6">
    {if $block.use_image}
      <img src="{$block.image_1.url}" alt="Image">
    {/if}
  </div>
  <div class="col-md-6">
    {$block.html nofilter}
  </div>
</div>
