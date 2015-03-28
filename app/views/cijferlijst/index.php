<table class="table">

    <thead>
        <tr>
            <th>Datum</th>
            <th>Tentamen</th>
            <th>Uitgevoerd</th>
            <th>Cijfer</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($data['cijferlijst'] as $resultaat):
            ?>
            <tr>
                <td><?= $resultaat->datumeu ?></td>
                <td><?= $resultaat->tentamencode ?></td>
                <td><?= $resultaat->uitgevoerd ?></td>
                <td><?= $resultaat->cijfer ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>