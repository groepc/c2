<table class="table">

	<thead>
		<tr>
			<th>Datum</th>
			<th>Tentamen</th>
			<th>Cijfer</th>
		</tr>
	</thead>
	
	<tbody>
		<?php
			foreach ($data['cijferlijst'] as $resultaat):
		?>
			<tr>
				<td><?= $resultaat->datumtijd ?></td>
				<td><?= $resultaat->tentamenCode ?></td>
				<td><?= $resultaat->cijfer ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>