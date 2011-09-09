<div class="container">
	<div class="hero-unit">
		<h1><?=$results->row()->title?></h1>
	</div>	

	<?php $kitten = rand(1,$kittennum);?>
	<div class="page-header">
	    <h1><?=$results->row()->title?> <small><?=$results->row()->subtitle . ' - ' . $results->row()->entrydate?> </small></h1>
	</div>	
	<div class="row">
		<div class="span4 columns">
			<h2>Kitten!</h2>
			<img src="/images/kittens/<?=$kitten?>.jpg" width="210px">
		</div>
		<div class="span12 columns">
			<h3><?=$results->row()->title?></h3>
			<p><?= nl2br($results->row()->note)?></p>
		</div>
	</div>	
</div>
