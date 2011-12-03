<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<table class="zebra-striped">
<thead>
  <tr>
    <th>id</th>
    <th>Description</th>
    <th>URL Friendly</th>
    <th>Active</th>
  </tr>
</thead>
<tbody>
<?php foreach ($results->result_array() as $row) :?>

	  <tr>
	    <td><a href="/forediting/tagedit/<?=$row['idtagtypes']?>"><?=$row['idtagtypes']?></a></td>
	    <td><?=$row['description']?></td>
	    <td><?=$row['urlfriendly']?></td>
	    <td><?=($row['active']==1 ? 'TRUE' : 'FALSE')?></td>
	  </tr>				

<?php endforeach;?>

</tbody>
</table>
</div>
