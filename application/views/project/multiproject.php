<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
                <p><?=$subtitle?></p>
	</div>	
<?php foreach($results->result_array() as $row):?>
<div class="page-header">
    <h1><?=$row['title']?> <small><?=$row['startdate']?> - <?=($row['enddate']!= '00/00/0000' ? $row['enddate'] : 'ACTIVE' )?> </small></h1>
</div>	
<div class="row">
<div class="span4 columns">
	<a class="btn" href="/project/index/<?=$row['idproject']?>">More Information</a>
</div>
<div class="span12 columns">
      <h3><?=$row['title']?></h3>
      <p><?=$row['companyname']?> - <a href="<?=$row['companyurl']?>"><?=$row['companyurl']?></a></p>
      <p>Contact: <?=$row['companycontactperson']?> - <?=$row['companycontactpersonemail']?></p>
      <p>Description: <?= nl2br($row['note'])?></p>

</div>
</div>

<?php endforeach;?>    
</div>
