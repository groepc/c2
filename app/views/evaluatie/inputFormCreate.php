<div class="form-group">
    <label for="datumtijd" class="col-sm-2 control-label">Datum</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="datumtijd" name="datumtijd" value="<?php echo date('Y-m-d'); ?>" readonly>
    </div>
</div>

<!-- Exam speciality -->
<div class="form-group">
    <label for="tentamenCode" class="col-sm-2 control-label">Tentamencode</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="tentamenCode" name="tentamenCode" value="<?php echo $data['code'] ?>" readonly>
    </div>
</div>

<!-- Exam speciality -->
<div class="form-group">
    <label for="cijfer" class="col-sm-2 control-label">Cijfer</label>
    <div class="col-sm-10">
        <input type="number" min="1" max="10" step="0.1" class="form-control" id="cijfer" name="cijfer" placeholder="Cijfer" required>
    </div>
</div>

<!-- Exam speciality -->
<div class="form-group">
    <label for="examStudents" class="col-sm-2 control-label">Opmerkingen</label>
    <div class="col-sm-10">
        <textarea name="document" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
</div>