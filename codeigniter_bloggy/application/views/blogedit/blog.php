<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<table class="zebra-striped">
<thead>
  <tr>
    <th>id</th>
    <th>title</th>
    <th>sub title</th>
    <th>entry date</th>
  </tr>
</thead>
<tbody>
<?php foreach ($results->result_array() as $row) :?>

	  <tr>
	    <td><a href="/blogedit/blogedit/<?=$row['idblogentry']?>"><?=$row['idblogentry']?></a></td>
	    <td><?=$row['title']?></td>
	    <td><?=$row['subtitle']?></td>
	    <td><?=$row['entrydate']?></td>
	  </tr>				

<?php endforeach;?>

</tbody>
</table>
</div>
