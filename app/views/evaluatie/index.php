<table class="table">

    <thead>
        <tr>
            <th>Datum</th>
            <th>Tentamen</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php
        if (count($data['evaluaties']) > 0) :
            foreach ($data['evaluaties'] as $resultaat):
                ?>
                <tr>
                    <td><?= $resultaat->datumeu ?></td>
                    <td><?= $resultaat->tentamencode ?></td>
                    <td><a href="<?php echo DIR; ?>evaluatie/<?php echo $resultaat->ID; ?>/<?php echo $resultaat->tentamencode; ?>"><span class="label label-success">Maak evaluatie</span></a></td>
                </tr>
                <?php
            endforeach;
        else :
            ?>
        <div class="alert alert-info">Er zijn geen tentamens gevonden waarvoor je een evaluatie kunt schrijven.</div>
    <?php endif; ?>
</tbody>
</table>