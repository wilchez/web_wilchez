<?php

echo '<div class="mensaje"> <article> <div class="comentador">	<div class="ima ima_mensaje"> <figure>
<img src="data/'.$imagen.'"> </figure> </div> <br> <h3>'.$comentador.'</h3> </div>
<div class="info">
<div class="comentario" style="clear: both; "><p>'.$comentario.'</p></div>
<div class="fecha_comentario">	
<h3>'.$fecha.'</h3>
<div class="likes">	
<a  class="voto" href="#">! '.$likes.'</a>  <a  class="voto" href="#"># '.$nolikes.' </a>   <a  class="voto" href="#">" '.$dislikes.'</a> </div>
</div></article></div></div>';

?>
