<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<table class="zebra-striped">
<thead>
  <tr>
    <th>id</th>
    <th>Desc</th>
    <th>URL</th>
    <th>Note</th>
  </tr>
</thead>
<tbody>
<?php foreach ($results->result_array() as $row) :?>

	  <tr>
	    <td><a href="/forediting/linkedit/<?=$row['idlink']?>"><?=$row['idlink']?></a></td>
	    <td><?=$row['description']?></td>
	    <td><?=$row['url']?></td>
            <td><?=$row['note']?></td>
	  </tr>				

<?php endforeach;?>

</tbody>
</table>
</div>
