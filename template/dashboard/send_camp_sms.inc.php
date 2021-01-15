
<script type="text/javascript">
function sendID(id){
  console.log(id)
  $.ajax({
   url:"./out_sms.php",
   method:"POST",
   data:{'id' : id}
  });

}
</script>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nume Camapanie</th>
      <th scope="col">Subiect</th>
      <th scope="col">Actiune</th>
    </tr>
  </thead>
    <tbody>

        <?php foreach ($sms_details as $sms): ?>
          <tr>
          <th scope="row"><?php echo $sms->id_sms; ?></th>
          <td><?php  echo $sms->nume_sms;?></td>
          <td> <?php  echo $sms->subject_sms;?></td>
          <td><button type="button" data-toggle="modal" data-target="#modal_<?php  echo $sms->id_sms;?>" class="btn btn-warning">Review&Send</button></td>
        </tr>
         <?php endforeach; ?>
     </tbody>


     <?php foreach ($sms_details as $sms): ?>
       <div id="modal_<?php  echo $sms->id_sms;?>" class="modal fade">
     <div class="modal-dialog" style="width:628px !important;">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title"><?php  echo $sms->nume_sms;?></h4>
       </div>
       <div class="modal-body">
         <iframe id="iframe<?php  echo $sms->id_sms;?>" width="600" height="320"></iframe>
         <script type="text/javascript">
         $("#iframe<?php  echo $sms->id_sms;?>").contents().find("body").append(`<?php echo $sms->content_sms;?>`);
         </script>
       </div>
       <div class="modal-footer">
         <button type="button" name="insert" id="insert"  onclick="sendID(<?php  echo $sms->id_sms;?>)" data-dismiss="modal" class="btn btn-success"> Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
     </div>
     </div>
     <?php endforeach; ?>
