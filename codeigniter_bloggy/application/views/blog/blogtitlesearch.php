<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>	
	<?php foreach($results->result_array() as $row):?>
		<?php $kitten = rand(1,$kittennum);?>
		<div class="page-header">
		    <h1><a href="/blog/title/<?=$row['titleurl']?>"><?=$row['title']?></a> <small><?=$row['subtitle'] . ' - ' . $row['entrydate']?> </small></h1>
		</div>	
		<div class="row">
			<div class="span12 columns offset4">
				<h3><?=$row['title']?></h3>
			</div>
		</div>

	<?php endforeach;?>	
</div>
