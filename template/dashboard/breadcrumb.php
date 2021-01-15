
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>


  </ol>
</nav>
<script>
$(document).ready(function(){
  hrml="";
switch(document.title) {
  case 'Edit Profile':
  case 'Contact':
  case 'Status':
    html=`<li class="breadcrumb-item active" aria-current="page">`+document.title+`</li>`;
    break;
  case 'Edit Password':
      html=`<li class="breadcrumb-item active" aria-current="page">`+document.title+`</li>`;
  break;
  case 'Programare Noua':
  case 'Reprezentant':
      html=`<li class="breadcrumb-item active"> Programari </li>
    <li class="breadcrumb-item active" aria-current="page">`+document.title+`</li>`
  break;
  case 'Trimitere Campanie Emails':
  case 'Creare Email Template':
        html=`<li class="breadcrumb-item active"> EMAIL </li>
      <li class="breadcrumb-item active" aria-current="page">`+document.title+`</li>`
    break;
  case 'Creare SMS Template':
  case 'Trimitere Campanie SMS':
          html=`<li class="breadcrumb-item active"> SMS </li>
        <li class="breadcrumb-item active" aria-current="page">`+document.title+`</li>`
        break;
  default:
      html=``;
}
$('.breadcrumb').append(html)
})

</script>
