<label for="dsdivision" class="form-label">Select DS Division</label>
<select id="dsdivision" class="form-select" name="dsdivision" >
    <option>--</option>
    <?php foreach ($list as $key => $result) { ?>
        <option value="<?= $result['Id'] ?>"><?= $result['DsName'] ?></option>
    <?php } ?>
</select>
<span class="text-danger"><?= service('validation')->getError('dsdivision') ?></span>

