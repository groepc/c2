<?php if (!empty($data['error'])) : ?>
    <div class="alert alert-danger">
        <?php echo $data['error']; ?>
    </div>
    <?php
endif;
if (count($data['tentamen']) > 0) :
    ?>
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
            $i = 0;
            foreach ($data['tentamen'] as $resultaat):

                $date = strtotime($resultaat->datumtijd);
                $dateBegin = strtotime("-4 weeks", $date);
                $dateEnd = strtotime("-3 weeks", $date);
                if ($date >= $dateNow):
                    $i++;
                    ?>
                    <tr>
                        <td><?= $resultaat->datumeu ?></td>
                        <td><?= $resultaat->tentamencode ?></td>
                        <td><?= $resultaat->lokaalCode ?></td>
                        <td>
                            <?php
                            $check = false;
                            foreach ($data['inschrijving'] as $inschrijving):
                                if ($resultaat->ID == $inschrijving->planningID):
                                    $check = true;
                                endif;
                            endforeach;
                            if ($check == false && $dateNow > $dateBegin && $dateNow < $dateEnd): ?>

                                <a href="<?php echo DIR; ?>tentamens/in/<?= $resultaat->ID ?>">Inschrijven</a>
                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if ($check == true): ?> 
                                <a href="<?php echo DIR; ?>tentamens/uit/<?= $resultaat->ID ?>">Uitschrijven</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                endif;
            endforeach;
            ?>
        </tbody>
    </table>
    <?php if ($i === 0) : ?>
        <div class="alert alert-info">Er zijn geen tentamens gevonden.</div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-info">Er zijn geen tentamens gevonden.</div>
<?php endif; ?>