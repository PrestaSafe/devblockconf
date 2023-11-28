<div {if $block.settings.default.container} class="container" {/if}>

{* 
  Champs text: {$block.settings.text}
  Categorie : {dump($block.settings.category)} *}

<div class="text-center py-3 my-3">
  {prettyblocks_title block=$block field="title_field" classes=['h3', 'text-center', 'pb-4']} 
</div>


<div class="devblockconf p-3">
This block use CSS COMPILED
</div>




  <div class="parallax-section" style="background-image: url('{$block.settings.image_1.url}');">
    <!-- Contenu de la section parallaxe ici -->
  </div>

  Champs text: {$block.settings.text}
{* 
  <code>
    Value of bg color: <code>{literal} {$block.settings.default.bg_color} {/literal} = {dump($block.settings.default.bg_color)} </code> 
    {if $block.settings.default.bg_color}<span style="background-color: {$block.settings.default.bg_color};">&nbsp;&nbsp;&nbsp;&nbsp;</span>{/if}
    Value of container: <code>{literal} {$block.settings.default.container} {/literal} = {dump($block.settings.default.container)} </code>
  </code>
   *}


   <br>
  Repeated elements: 
  <ul>
  {foreach from=$block.states item=state}
    <li>{$state.text_field} </li><br>
  {/foreach}
  </ul>
</div>