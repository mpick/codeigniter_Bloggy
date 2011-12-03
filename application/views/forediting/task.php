<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<table class="zebra-striped">
<thead>
  <tr>
    <th>id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Due Date</th>
    <th>Est Hours</th>
    <th>Completed Date</th>
  </tr>
</thead>
<tbody>
<?php foreach ($results->result_array() as $row) :?>

	  <tr>
	    <td><a href="/forediting/taskedit/<?=$row['milestoneid'] . '/' . $row['idmilestonetask']?>"><?=$row['idmilestonetask']?></a></td>
	    <td><?=$row['title']?></td>
	    <td><?=$row['description']?></td>
	    <td><?=$row['duedate']?></td>
            <td><?=$row['estimatedhours']?></td>
	    <td><?=$row['completeddate']?></td>
	  </tr>				

<?php endforeach;?>

</tbody>
</table>
</div>
