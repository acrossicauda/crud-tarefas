<div class="container mt-5">
    <form method="post" id="up_o_in_category" name="up_o_in_category" 
    action="<?= base_url('nova-categoria') ?>">
        <input type="hidden" name="idcategory" id="idcategory" value="<?php echo $category['idcategory']; ?>">

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="<?php echo $category['description']; ?>" required>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Salvar</button>
        </div>
    </form>
</div>