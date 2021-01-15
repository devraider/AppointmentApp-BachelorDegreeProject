<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/email_create.inc.php');
$navbar -> title = TITLE_TEMPEMAIL;
$navbar -> html_creator_heads = '
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
';


echo $navbar.$content;
