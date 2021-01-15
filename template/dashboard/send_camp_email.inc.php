
<script type="text/javascript">
function sendID(id){
  console.log(id)
  $.ajax({
   url:"./out_mailer.php",
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

        <?php foreach ($newsletter_details as $newsletter): ?>
          <tr>
          <th scope="row"><?php echo $newsletter->id_newsletter; ?></th>
          <td><?php  echo $newsletter->nume_newsletter;?></td>
          <td> <?php  echo $newsletter->subject_newsletter;?></td>
          <td><button type="button" data-toggle="modal" data-target="#modal_<?php  echo $newsletter->id_newsletter;?>" class="btn btn-warning">Review&Send</button></td>
        </tr>
         <?php endforeach; ?>
     </tbody>


     <?php foreach ($newsletter_details as $newsletter): ?>
       <div id="modal_<?php  echo $newsletter->id_newsletter;?>" class="modal fade">
     <div class="modal-dialog" style="width:628px !important;">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title"><?php  echo $newsletter->nume_newsletter;?></h4>
       </div>
       <div class="modal-body">
         <iframe id="iframe<?php  echo $newsletter->id_newsletter;?>" width="600" height="320"></iframe>
         <script type="text/javascript">
         $("#iframe<?php  echo $newsletter->id_newsletter;?>").contents().find("body").append(`<?php echo $newsletter->content_newsletter;?>`);
         </script>
       </div>
       <div class="modal-footer">
         <button type="button" name="insert" id="insert"  onclick="sendID(<?php  echo $newsletter->id_newsletter;?>)" data-dismiss="modal" class="btn btn-success"> Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
     </div>
     </div>
     <?php endforeach; ?>
