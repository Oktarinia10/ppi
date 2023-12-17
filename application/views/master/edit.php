<!-- Formulir Edit Data -->
<form action="<?= site_url('c_master/update_data'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="mst_form_id" value="<?= $mstform['mst_form_id']; ?>">
    <label for="mst_name">Master Name:</label>
    <input type="text" name="mst_name" value="<?= $mstform['mst_name']; ?>">
    <br>
    <label for="mst_form_st">Master Form St:</label>
    <input type="text" name="mst_form_st" value="<?= $mstform['mst_form_st']; ?>">
    <br>
    <button type="submit">Update Data</button>
</form>
