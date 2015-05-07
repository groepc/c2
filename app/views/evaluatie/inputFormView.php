<div class="form-group">
    <label for="datumtijd" class="col-sm-2 control-label">Datum</label>
    <div class="col-sm-10">
        <?php echo $data['alreadyCreated']->datumeu; ?>
    </div>
</div>

<!-- Exam speciality -->
<div class="form-group">
    <label for="tentamenCode" class="col-sm-2 control-label">Tentamencode</label>
    <div class="col-sm-10">
        <?php echo $data['alreadyCreated']->teantemenCode; ?>
    </div>
</div>

<!-- Exam speciality -->
<div class="form-group">
    <label for="cijfer" class="col-sm-2 control-label">Cijfer</label>
    <div class="col-sm-10">
        <?php echo $data['alreadyCreated']->cijfer; ?>
    </div>
</div>

<!-- Exam speciality -->
<div class="form-group">
    <label for="examStudents" class="col-sm-2 control-label">Opmerkingen</label>
    <div class="col-sm-10">
        <?php echo nl2br($data['alreadyCreated']->document); ?>
    </div>
</div>