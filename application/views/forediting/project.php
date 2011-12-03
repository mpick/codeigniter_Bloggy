<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<table class="zebra-striped">
<thead>
  <tr>
    <th>id</th>
    <th>Title</th>
    <th>Company Name</th>
    <th>StartDate</th>
    <th>EndDate</th>
  </tr>
</thead>
<tbody>
<?php foreach ($results->result_array() as $row) :?>

	  <tr>
	    <td><a href="/forediting/projectedit/<?=$row['idproject']?>"><?=$row['idproject']?></a></td>
	    <td><?=$row['title']?></td>
	    <td><?=$row['companyname']?></td>
            <td><?=$row['startdate']?></td>
	    <td><?=$row['enddate']?></td>
	  </tr>				

<?php endforeach;?>

</tbody>
</table>
</div>
