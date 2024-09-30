<label for="Itemname" class="form-label">Select Item Name</label>
<select id="Itemname" class="form-select" name="Itemname" >
    <option>--</option>
    <?php foreach ($list as $key => $result) { ?>
        <option value="<?= $result['ItemCode'] ?>"><?= $result['ItemName'] ?></option>
    <?php } ?>
</select>

