
<div class="warning"></div>
<form id="insert_form" method="post">
  <label>SMS Name</label>
  <input type="text" name="sms_name" id="sms_name" class="form-control" /> <br>
  <label>SMS Subject</label>
  <input type="text" name="sms_subject" id="sms_subject" class="form-control" /><br>

    <label>SMS Content  </label>
  <textarea class="form-control" name="editordata" id="editordata" ></textarea>
  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
</form>

<script>
function message(){
$('.warning').append('<span class="glyphicon glyphicon-ok text-success" style="font-size:30px; margin:50px 0;"> SMS adaugat cu succes!</span>');
}
  $(document).ready(function() {
      // $('#summernote').summernote();


      $('#insert_form').on("submit", function(event){
       event.preventDefault();
       if($('#sms_name').val() == "")
       {
        alert("SMS Name is required");
       }
       else if($('#sms_subject').val() == '')
       {
        alert("SMS Subject is required");
       }
       else if($('#editordata').val() == '')
       {
        alert("SMS content is required");
       }

       else
       {
        $.ajax({
         url:"post_sms.php",
         method:"POST",
         data:$('#insert_form').serialize(),
         success:function(data){
           console.log('SMS adaugat');
           message();
           setTimeout(function (){$('span.glyphicon.glyphicon-ok.text-success').hide();}, 10000);

         }
        });
       }
      });
  });
</script>
