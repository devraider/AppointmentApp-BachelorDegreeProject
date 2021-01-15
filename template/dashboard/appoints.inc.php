<script>
$(document).ready(function(){
  $('#datetimepicker1').datetimepicker({
    defaultDate: new Date(),
    stepping: 15,
    format:'HH:mm DD-MM-YYYY'
  });
  $('#datetimepicker2').datetimepicker({
    defaultDate: new Date(),
    stepping: 15,
    format:'HH:mm DD-MM-YYYY'
  });


  $.ajax({
    method: "GET",
    url: "../../licenta/dashboard/get_programari.php",
    success: function (data) {
        moment.locale('en');
        currentData=JSON.parse(data)
        newEvents=[]
        for (i=0;i<currentData.length;i++) {
          newData ={
            start:moment(currentData[i]['start_programare'], "HH:mm DD-MM-YYYY").format('X'),
            end:moment(currentData[i]['end_programare'], "HH:mm DD-MM-YYYY").format('X'),
            title: 'Programare ' + currentData[i]['nume_client'].split(" ")[0],
            category:currentData[i]['nume_reprezentant'] ,
            content: 'Client: '+currentData[i]['nume_client'] +"<br>Detalii suplimentare: ["+ currentData[i]['info'] +"]<br> Reprezentant: " +  currentData[i]['nume_reprezentant'] +"("+currentData[i]['telefon_reprezentant']+")"
          }
          newEvents.push(newData)
        }
        var now = moment();
        var calendar = $('#calendar').Calendar({
          locale: 'en',
          weekday: {
            timeline: {
              intervalMinutes: 30,
              fromHour: 10
            }
          },
          events: newEvents
        }).init();

        /**
         * Listening for events
         */

        $('#calendar').on('Calendar.init', function(event, instance, before, current, after){
          console.log('event : Calendar.init');
          console.log(instance);
          console.log(before);
          console.log(current);
          console.log(after);
        });
        $('#calendar').on('Calendar.daynote-mouseenter', function(event, instance, elem){
          console.log('event : Calendar.daynote-mouseenter');
          console.log(instance);
          console.log(elem);
        });
        $('#calendar').on('Calendar.daynote-mouseleave', function(event, instance, elem){
          console.log('event : Calendar.daynote-mouseleave');
          console.log(instance);
          console.log(elem);
        });
        $('#calendar').on('Calendar.event-mouseenter', function(event, instance, elem){
          console.log('event : Calendar.event-mouseenter');
          console.log(instance);
          console.log(elem);
        });
        $('#calendar').on('Calendar.event-mouseleave', function(event, instance, elem){
          console.log('event : Calendar.event-mouseleave');
          console.log(instance);
          console.log(elem);
        });
        $('#calendar').on('Calendar.daynote-click', function(event, instance, elem, evt){
          console.log('event : Calendar.daynote-click');
          console.log(instance);
          console.log(elem);
          console.log(evt);
        });
        $('#calendar').on('Calendar.event-click', function(event, instance, elem, evt){
          console.log('event : Calendar.event-click');
          console.log(instance);
          console.log(elem);
          console.log(evt);
        });
      }
      });

});

</script>
<div align="center">
    <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn-lg btn-danger">Programare noua</button>

</div>
<div id="calendar"></div>

   <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Creare programare noua!</h4>
   </div>
   <div class="modal-body">

    <form method="post" id="insert_form">
     <label>Numar de telefon/Email</label>
     <input type="text" name="phoneoremail" id="phoneoremail" class="form-control" />
     <br />
     <label>Nume Client</label>
     <input type="text" name="name" id="name" class="form-control" /> <br>
     <label for="reprezentant">Selecteaza un reprezentant:</label>
     <select name="reprezentant" id="reprezentant" class="btn btn-dark ">
       <option value="none">Reprezentant</option>
       <?php foreach ($getAllRepresentants as $rep): ?>
         <option value="<?php printf( $rep->id_reprezentant); ?>"><?php printf ($rep->nume_reprezentant); ?></option>

        <?php endforeach; ?>
     </select>
     <br><br>
     <label>Sedinta incepe la:</label>
     <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' name="start_sedinta" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <br>
     <label>Sedinta se sfarseste la:</label>
     <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' name="end_sedinta" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <br />
     <label>Detalii suplimentare:</label>
    <textarea name="detalii_programare" id="detalii_programare" class="form-control"></textarea>
    <br />

    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>




<script>
function message(){
$('#insert_form').hide();
$('.modal-body').append('<span class="glyphicon glyphicon-ok text-success" style="font-size:20px; margin:20px 0;"> Programre adaugata cu succes!</span>');
}
$(document).ready(function(){

 $('#insert_form').on("submit", function(event){
  event.preventDefault();
  if($('#name').val() == "")
  {
   alert("Nume Client is required");
  }
  else if($('#phoneoremail').val() == '')
  {
   alert("Nr.Tel. sau Email is required");
  }
  else if($('#phoneoremail').val() == '')
  {
   alert("Nr.Tel. sau Email is required");
  }

  else
  {
   $.ajax({
    url:"post_programari.php",
    method:"POST",
    data:$('#insert_form').serialize(),
    success:function(data){
      console.log('Programare adaugata');
      message();
      setTimeout(function (){$('span.glyphicon.glyphicon-ok.text-success').hide();$('#insert_form').show()}, 10000);

    }
   });
  }
 });
  });
 </script>


</body>
</html>
