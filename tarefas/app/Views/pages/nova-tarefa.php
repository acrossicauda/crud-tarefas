<div class="container mt-5">
    <form method="post" id="up_or_in_task" name="up_or_in_task" 
    action="<?= base_url('nova-tarefa') ?>">
        <input type="hidden" name="idtask" id="idtask" value="<?php echo $tasks['idtask']; ?>">

        <div class="form-group">
            <label>Email</label>
            <input type="date" name="data_end" class="form-control" value="<?php echo $tasks['data_end']; ?>" required>
        </div>

        <div class="form-group">
            <select name="category" id="category" class="form-control" required>
                <option value=""> -- CATEGORIA -- </option>
                <?php if(isset($tasks['categories']) && !empty($tasks['categories'])): ?>
                    <?php foreach($tasks['categories'] as $category): ?>
                        <option value="<?= $category['idcategory'] ?>"> <?= $category['description'] ?> </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <a href="<?php echo base_url('nova-categoria') ?>">Adicionar Categoria</a>
        </div>
        
        <div class="form-group">
            <select name="responsible" id="responsible" class="form-control" required>
                <option value=""> -- RESPONSÁVEL -- </option>
                <?php if(isset($tasks['responsibles']) && !empty($tasks['responsibles'])): ?>
                    <?php foreach($tasks['responsibles'] as $responsible): ?>
                        <option value="<?= $responsible['idresponsibles'] ?>"> <?= $responsible['name'] ?> </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <a href="<?php echo base_url('novo-responsavel') ?>">Adicionar Responsável</a>
        </div>

        <div class="form-group">
            <textarea name="description-task" id="description-task" cols="30" rows="10" class="form-control"></textarea>
        </div>
        
        
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Salvar</button>
        </div>
    </form>
</div>

  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>