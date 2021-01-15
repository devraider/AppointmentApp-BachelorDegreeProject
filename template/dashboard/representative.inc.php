<?php echo $smtgwrong ?>
<form class="form-horizontal" method="post">
<div class="form-group">
<label  class="col-sm-2 control-label"><span class="text-danger">*</span> Nume</label>
<div class="col-sm-4">
<input type="text" name="nume" class="form-control" placeholder="Popescu Ionut">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Functie</label>
<div class="col-sm-4">
<input type="text" name="functie" class="form-control"   placeholder="Functie">
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">Email </label>
<div class="col-sm-4">
<input type="text" name="email" class="form-control"   placeholder="Email">
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label"><span class="text-danger">*</span> Nr. Telefon </label>
<div class="col-sm-4">
<input type="text" name="telefon" class="form-control"   placeholder="07222222222">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="edit" class="btn btn-danger">Add</button>
</div>
</div>
</form>



<div class="container search-table">
        <div class="search-box" style="background:#fff;border:0;">
            <div class="row">
                <div class="col-md-3">
                    <h5>Cauta in reprezentati:</h5>
                </div>
                <div class="col-md-9">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Popescu">
                    <script>
                        $(document).ready(function () {
                            $("#myInput").on("keyup", function () {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function () {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="search-list">
            <span class="h3" style="padding:0 20px;" >Total reprezentanti comapnie: <?php echo !empty(count($getAllRepresentants))? count($getAllRepresentants) : '0' ; ?></span>
            <table class="table" >
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Functie</th>
                        <th>Email</th>
                        <th>Telefon</th>
                    </tr>
                </thead>
                <tbody>

                  <?php foreach($getAllRepresentants as $data): ?>
                <tr>
                    <td><?php echo $data-> nume_reprezentant; ?></td>
                    <td><?php echo $data-> functie_reprezentant ? $data-> functie_reprezentant : '-'; ?></td>
                    <td><?php echo $data-> email_reprezentant ? $data-> email_reprezentant : '-'; ?></td>
                    <td><?php echo $data-> telefon_reprezentant; ?></td>
                </tr>
              <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
  </body>
</html>
