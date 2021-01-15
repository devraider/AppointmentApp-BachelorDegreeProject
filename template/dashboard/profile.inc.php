
<!-- /.row -->
<?php echo $smtgwrong ?>
<form class="form-horizontal" method="post">
<div class="form-group">
<label  class="col-sm-2 control-label">Email</label>
<div class="col-sm-4">
<input type="email" name="email" class="form-control" value="<?php echo $company_data-> email; ?>" >
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Nume Companie</label>
<div class="col-sm-4">
<input type="text" name="cname" class="form-control"  value="<?php echo $company_data-> nume_companie; ?>" >
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">Ocupatie</label>
<div class="col-sm-4">
<input type="text" name="cactivity" class="form-control"  value="<?php echo $company_data-> ocupatie; ?>" >
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">Adresa</label>
<div class="col-sm-4">
<input type="text" name="adress" class="form-control"  value="<?php echo $company_data-> adresa ; ?>" >
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">Telefon</label>
<div class="col-sm-4">
<input type="text" name="ph" class="form-control"  value="<?php echo $company_data-> telefon; ?>">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="edit" class="btn btn-default">Edit</button>
</div>
</div>
</form>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div><!-- /#wrapper -->
</body>
</html>
