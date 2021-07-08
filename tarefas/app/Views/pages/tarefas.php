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
             <th>User Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($tasks): ?>
          <?php foreach($tasks as $task): ?>
          <tr>
             <td><?php echo $task['id']; ?></td>
             <td><?php echo $task['name']; ?></td>
             <td><?php echo $task['email']; ?></td>
             <td>
              <a href="<?php echo base_url('edit-view/'.$task['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('delete/'.$task['id']);?>" class="btn btn-danger btn-sm">Delete</a>
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