<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo base_url('novo-responsavel') ?>" class="btn btn-success mb-2">Adicionar novo Responsável</a>
	</div>
    <br>
    <?php
     if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="responsibles-list">
       <thead>
          <tr>
             <th>ID</th>
             <th>Nome</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
          <?php if($responsibles): ?>
          <?php foreach($responsibles as $responsible): ?>
          <tr>
             <td><?php echo $responsible['idresponsible']; ?></td>
             <td><?php echo $responsible['description']; ?></td>
             <td>
              <a href="<?php echo base_url('nova-categoria?id='.$responsible['idresponsibles']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('categoria-delete?id='.$responsible['idresponsibles']);?>" class="btn btn-danger btn-sm">Deletar</a>
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
      $('#responsibles-list').DataTable();
  } );
</script>