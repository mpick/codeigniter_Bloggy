<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
                <p><?=$subtitle?></p>
	</div>	
<?php foreach($results as $row):?>
<div class="page-header">
    <h1><?=$row['description']?> <small> </small></h1>
</div>	
<div class="row">
<div class="span4 columns">
<img src="/images/software/<?=$row['idsoftware']?>.jpg" width="210px">
</div>
<div class="span12 columns">
      <h3><a href="<?=$row['url']?>"><?=$row['url']?></a></h3>
      <?= nl2br($row['note'])?>

</div>
</div>

<?php endforeach;?>    
</div>
