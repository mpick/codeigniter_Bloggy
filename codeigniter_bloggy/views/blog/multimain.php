<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>	
	<?php foreach($results->result_array() as $row):?>
		<?php $kitten = rand(1,$kittennum);?>
		<div class="page-header">
		    <h1><?=$row['title']?> <small><?=$row['subtitle'] . ' - ' . $row['entrydate']?> </small></h1>
		</div>	
		<div class="row">
			<div class="span4 columns">
				<h2>Kitten!</h2>
				<img src="/images/kittens/<?=$kitten?>.jpg" width="210px">
			</div>
			<div class="span12 columns">
				<h3><?=$row['title']?></h3>
				<p><?= nl2br($row['note'])?></p>
			</div>
		</div>

	<?php endforeach;?>	
</div>
