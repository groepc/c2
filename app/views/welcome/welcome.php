<p>Hallo <?php echo $data['name']; ?>!</p>

<pre>
<?php
print_r($data);
?>
</pre>


<table class="table">

	<thead>
		<tr>
			<th>Datum</th>
			<th>Tentamen</th>
			<th>Lokaal</th>
			<th>Inschrijven</th>
			<th>Uitschrijven</th>
		</tr>
	</thead>

	<tbody>
		<?php
			$dateNow = strtotime(date('Y-m-d H:i'));
			foreach ($data['tentamen'] as $tentamen):
				$date = strtotime($tentamen->datumtijd);
				if($date >= $dateNow):
					echo 'test ';
				endif;
			endforeach;
		?>
	</tbody>
</table>