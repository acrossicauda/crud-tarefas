<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo base_url('nova-tarefa') ?>" class="btn btn-success mb-2">Adicionar nova Tarefa</a>
	</div>
    <br>
    <?php
     if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="tasks-list">
       <thead>
          <tr>
             <th>ID</th>
             <th>Descrição</th>
             <th>Data Encerramento</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($tasks): ?>
          <?php foreach($tasks as $task): ?>
          <tr>
             <td><?php echo $task['idtasks']; ?></td>
             <td><?php echo $task['description']; ?></td>
             <td>
                 <?php
                    $data_end = explode(' ', $task['data_end']);
                    $data_end = $data_end[0];
                    $dia = substr($data_end, 8,2);
                    $mes = substr($data_end, 5,2);
                    $ano = substr($data_end, 0,4);
                    $data_end = "{$dia}/{$mes}/{$ano}";
                    echo $data_end;
                ?>
                </td>
             <td>
              <a href="<?php echo base_url('tarefas-view?id='.$task['idtasks']);?>" class="btn btn-success btn-sm">Visualizar</a>
              <a href="<?php echo base_url('nova-tarefa?id='.$task['idtasks']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('tarefa-delete?id='.$task['idtasks']);?>" class="btn btn-danger btn-sm">Deletar</a>
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
      $('#tasks-list').DataTable();
  } );
</script>