<div class="container mt-5">
    <form method="post" id="up_o_in_responsible" name="up_o_in_responsible" 
    action="<?= site_url('/novo-responsavel') ?>">
        <input type="hidden" name="idcategory" id="idcategory" value="<?php echo $category['idcategory']; ?>">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo $category['name']; ?>">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Salvar</button>
        </div>
    </form>
</div>