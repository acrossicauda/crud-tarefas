<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <h3>Tarefa <?php echo $tasks[0]['description']; ?></h3>
	</div>
    <br>
    <?php
     if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
    <div class="col-md-12">
        <h4><b>Tarefa:</b> <?= $tasks[0]['description']; ?></h4>
    </div>
    <div class="col-md-12">
        <h4><b>Responsável:</b> <?= $tasks[0]['name']; ?></h4>
    </div>
    <div class="col-md-12">
        <h4><b>Categoria:</b> <?= $tasks[0]['cat_description']; ?></h4>
    </div>
    <div class="col-md-12">
        <h4><b>Data Encerramento:</b> 
         <?php
             $data_end = explode(' ', $tasks[0]['data_end']);
             $data_end = $data_end[0];
             $dia = substr($data_end, 8,2);
             $mes = substr($data_end, 5,2);
             $ano = substr($data_end, 0,4);
             $data_end = "{$dia}/{$mes}/{$ano}";
             echo $data_end;
         ?></h4>
     </div>
  </div>
</div>