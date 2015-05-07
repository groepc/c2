<h3>Hallo <?php echo $data['name']; ?>!</h3>
<hr>
<h4>Komende tentamens</h4>

<table class="table">

	<thead>
		<tr>
			<th>Datum</th>
			<th>Tentamen</th>
			<th>Lokaal</th>
		</tr>
	</thead>

	<tbody>
		<?php
			$dateNow = strtotime(date('Y-m-d H:i'));
			foreach ($data['tentamen'] as $tentamen):
				$date = strtotime($tentamen->datumtijd);
				if($date >= $dateNow):
					foreach ($data['inschrijving'] as $inschrijving):
						if ($tentamen->ID == $inschrijving->planningID): ?>
							<tr>
								<td><?= $tentamen->datumeu ?></td>
								<td><?= $tentamen->tentamencode ?></td>
								<td><?= $tentamen->lokaalCode ?></td>
							</tr>
						<?php endif;
					endforeach;
				endif;
			endforeach;
		?>
	</tbody>
</table>