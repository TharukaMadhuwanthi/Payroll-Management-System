<label for="amount" class="form-label">Select Loan Amount</label>
<select id="selectamount" class="form-select" name="selectamount" >
    <option>--</option>
    <?php foreach ($list as $key => $result) { ?>
        <option value="<?= $result['Id'] ?>"><?= $result['Amount'] ?></option>
    <?php } ?>
</select>
<span class="text-danger"><?= service('validation')->getError('selectamount') ?></span>

