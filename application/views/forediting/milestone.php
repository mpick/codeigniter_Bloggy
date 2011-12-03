<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<table class="zebra-striped">
<thead>
  <tr>
    <th>id</th>
    <th>Name</th>
    <th>Sub Title</th>
    <th>Est Release</th>
    <th>Release Date</th>
  </tr>
</thead>
<tbody>
<?php foreach ($results->result_array() as $row) :?>

	  <tr>
	    <td><a href="/forediting/milestoneedit/<?=$row['projectid'] . '/' . $row['idprojectmilestone']?>"><?=$row['idprojectmilestone']?></a></td>
	    <td><?=$row['name']?></td>
	    <td><?=$row['subtitle']?></td>
            <td><?=$row['estimatedreleasedate']?></td>
	    <td><?=$row['releasedate']?></td>
	  </tr>				

<?php endforeach;?>

</tbody>
</table>
</div>
