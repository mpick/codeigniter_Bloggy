<?php 
	$row = $results->row_array();
	$milestones = $this->project->getMilestone($row['idproject']);
?>

<div class="container">
	
	<div class="hero-unit">
		<h1><?=$row['title']?></h1>
                <p><?=$row['startdate']?> - <?=($row['enddate']!= '00/00/0000' ? $row['enddate'] : 'ACTIVE' )?></p>
	</div>	

<div class="page-header">
    <h1><?=$row['title']?> <small><?=$row['startdate']?> - <?=($row['enddate']!= '00/00/0000' ? $row['enddate'] : 'ACTIVE' )?> </small></h1>
</div>	
<div class="row">
<div class="span4 columns">
	<a class="btn" href="/info/projects/<?=$row['idproject']?>">More Information</a>
</div>
<div class="span12 columns">
      <h3><?=$row['title']?></h3>
      <p><?=$row['companyname']?> - <a href="<?=$row['companyurl']?>"><?=$row['companyurl']?></a></p>
      <p>Contact: <?=$row['companycontactperson']?> - <?=$row['companycontactpersonemail']?></p>
      Description: <?= nl2br($row['note'])?>
      <?php if($milestones->num_rows() > 0):?>
      
	      <h3>Milestones</h3>
	      <p>Major sections of the overall project, past and present.</p>	
		<div class="well">
		      <?php foreach($milestones->result_array() as $stone):?> 
		      <p><strong>Name: </strong><?=$stone['name']?> <strong>Release Date: </strong><?=($stone['releasedate'] != '00/00/0000' ? $stone['releasedate'] : $stone['estimatedreleasedate'])?></p>
		      <p><?=$stone['subtitle']?></p>
		      Description: <?= nl2br($stone['description'])?>
				<?php 
					$tasks = $this->project->getOpenTask($milestones->row()->idprojectmilestone);
					if ($tasks->num_rows() > 0):
				?>
					      <h4>Tasks</h4>
					      <?php foreach($tasks->result_array() as $taskrow):?>
						      <p><?=$taskrow['title']?> - <?=$taskrow['estimatedhours']?>HRS - DUE: <?=$taskrow['duedate']?></p>
						      <p><?= nl2br($taskrow['description'])?></p>
					      <?php endforeach; ?>
					<?php endif;?>
		      <?php endforeach;?>
		</div>
	      
      <?php endif; ?>
</div>
</div>
</div>
