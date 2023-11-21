IMG LEFT TEMPLATE !

Use <code>{literal} {$block} Variable {/literal}</code>

<div class="d-block row devblockconf">
  <div class="col-md-6">
    {if $block.settings.use_image}
      <img width="100px" src="{$block.settings.image_1.url}" alt="Image">
    {/if}
  </div>
  <div class="col-md-6">
    {$block.settings.html nofilter}
  </div>
</div>
