
<div class="warning">

</div>
<form id="insert_form" method="post">
  <label>Newsletter Name</label>
  <input type="text" name="newsletter_name" id="newsletter_name" class="form-control" />
  <label>Newsletter Subject</label>
  <input type="text" name="newsletter_subject" id="newsletter_subject" class="form-control" />
  <textarea id="summernote" name="editordata" id="editordata" ></textarea>
  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
</form>

<script>
function message(){
$('.warning').append('<span class="glyphicon glyphicon-ok text-success" style="font-size:30px; margin:50px 0;"> Newsletter adaugat cu succes!</span>');
}
  $(document).ready(function() {
      $('#summernote').summernote();


      $('#insert_form').on("submit", function(event){
       event.preventDefault();
       if($('#newsletter_name').val() == "")
       {
        alert("Newsletter Name is required");
       }
       else if($('#newsletter_subject').val() == '')
       {
        alert("Newsletter Subject is required");
       }
       else if($('#editordata').val() == '')
       {
        alert("Email content is required");
       }

       else
       {
        $.ajax({
         url:"post_newsletters.php",
         method:"POST",
         data:$('#insert_form').serialize(),
         success:function(data){
           console.log('Newsletter adaugat');
           message();
           setTimeout(function (){$('span.glyphicon.glyphicon-ok.text-success').hide();}, 10000);

         }
        });
       }
      });
  });
</script>
