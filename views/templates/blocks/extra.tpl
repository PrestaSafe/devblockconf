
{* <p class="{if $block.settings.alignment} text-sm-{$block.settings.alignment} {/if}">Hello from custom block ! </p> *}

Use <code>{literal} {$block} Variable {/literal}</code>

  Extra value: {$block.extra.random_value}

<div class="row devblockconf text-sm-center">
  <div class="col-md-12 ">
    {$block.settings.html nofilter}
  </div>
  <div class="col-md-12 ">
    {if $block.settings.use_image}
      <img width="100px" src="{$block.settings.image_1.url}" alt="Image">
    {/if}
  </div>
</div>
