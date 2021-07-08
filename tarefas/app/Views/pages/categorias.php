<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo base_url('nova-categoria') ?>" class="btn btn-success mb-2">Adicionar nova Categoria</a>
	</div>
    <br>
    <?php
     if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="categories-list">
       <thead>
          <tr>
             <th>ID</th>
             <th>Descrição</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
          <?php if($categories): ?>
          <?php foreach($categories as $category): ?>
          <tr>
             <td><?php echo $category['idcategory']; ?></td>
             <td><?php echo $category['description']; ?></td>
             <td>
              <a href="<?php echo base_url('nova-categoria?id='.$category['idcategory']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('categoria-delete?id='.$category['idcategory']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script>
    $(document).ready( function () {
      $('#categories-list').DataTable();
  } );
</script>