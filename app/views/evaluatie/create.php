<div class="row">
    <div class="col-sm-8">
        <?php if ($error): ?>
            <?php echo \core\error::display($error); ?>
            <?php
        endif;
        if (!empty($data['alreadyCreated'])) :
            ?>
            <div class="alert alert-info">
                Deze evaluatie is ingevoerd op: <?php echo $data['alreadyCreated']->datumeu; ?> om <?php echo $data['alreadyCreated']->insertTime; ?>
            </div>
            <div class="form-horizontal">
                <?php include 'inputFormView.php'; ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a class="btn btn-success" href="<?php echo DIR; ?>evaluatie">Ga Terug</a>
                    </div>
                </div>
            </div>
        <?php elseif ($data['created'] === true): ?>
            <div class="alert alert-success">
                Evaluatie succesvol opgeslagen.
            </div>
            <a class="btn btn-success" href="<?php echo DIR; ?>evaluatie">Ga Terug</a>
        <?php else: ?>

            <form class="form-horizontal" method="post" action="">
                <!-- Exam code -->
                <?php include 'inputFormCreate.php'; ?>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Evaluatie opslaan</button>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>