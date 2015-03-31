<?php echo $data['error']; ?>
    
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
					<?php 	$check = false;
							foreach($data['inschrijving'] as $inschrijving):
								if($resultaat->ID == $inschrijving->planningID):
									$check = true;
								endif;
							endforeach;
							if($check == false && $dateNow > $dateBegin && $dateNow < $dateEnd): ?>
							
					<a href="<?php echo DIR; ?>tentamens/in/<?= $resultaat->ID ?>">Inschrijven</a>
					<?php	endif; ?>
							
				</td>
				<td>
           			<?php	if($check == true): ?> 
           			<a href="<?php echo DIR; ?>tentamens/uit/<?= $resultaat->ID ?>">Uitschrijven</a>
           			<?php	endif; ?>
           		</td>
            </tr>
        <?php 	endif;
				endforeach; ?>
    </tbody>
</table>


