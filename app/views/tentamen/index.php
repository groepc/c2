<table class="table">

    <thead>
        <tr>
            <th>Datum</th>
            <th>Tentamen</th>
            <th>Lokaal</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php
		$dateNow = strtotime(date('Y-m-d H:i'));
		
		echo ($dateBegin . ' ' . $dateEnd);
		//print_r($data['inschrijving']);
        foreach ($data['tentamen'] as $resultaat):

			$date = strtotime($resultaat->datumtijd);
			$dateBegin = strtotime("-4 weeks", $date);
			$dateEnd = strtotime("-3 weeks", $date);
				
			if ($date >= $dateNow ):
            ?>
            <tr>
                <td><?= $resultaat->datumeu ?></td>
                <td><?= $resultaat->tentamencode ?></td>
                <td><?= $resultaat->lokaalCode ?></td>
				<td>
					<?php 	$x =0;
							foreach($data['inschrijving'] as $inschrijving):
								if($resultaat->ID == $inschrijving->planningID):
									$x++;
								endif;
							endforeach;
							if($x == 0 && $dateNow > $dateBegin && $dateNow < $dateEnd): ?>
							
					<a href="#">Inschrijven</a>
					<?php	endif; ?>
							
				</td>
				<td>
           			<?php	if($x > 0): ?> 
           			<a href="#">Uitschrijven</a>
           			<?php	endif; ?>
           		</td>
            </tr>
        <?php 	endif;
				endforeach; ?>
    </tbody>
</table>


