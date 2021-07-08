<div class="container mt-5">
    <form method="post" id="up_o_in_responsible" name="up_o_in_responsible" 
    action="<?= base_url('novo-responsavel') ?>">
        <input type="hidden" name="idresponsibles" id="idresponsibles" value="<?php echo $responsibles['idresponsibles']; ?>">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo $responsibles['name']; ?>">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Salvar</button>
        </div>
    </form>
</div>