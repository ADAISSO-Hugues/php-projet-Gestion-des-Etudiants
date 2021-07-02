<!doctype html>
<html lang="en">
  <head>
    <title>ISM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style type="text/css">
      body{ background-color:#efefef;padding-top:20px;}
form{
  width:800px;
  margin:0 auto;
  border-top:15px solid #313A3D;
  background:#FFF;
  padding:0 20px 60px;
  text-align:center;
  font-family:Raleway;
  text-align:center;
  color:#B6B6B6;
}
h3{
  text-transform:uppercase;
  font-size:20px;
  line-height:60px
}
div *{box-sizing:border-box;}
div{
  width:70%;
  margin:10px auto;
  height:50px;
}
div input, textarea{
  width:100%;
  height:100%;
  opacity:0.9;
  padding-left:22%;
  background-color:#E8E9EA;
  border:0;
  outline:none;
  margin:0;
}
label{
  display:block;
  position:relative;
  top:-50px;
  width:100%;
  height:100%;
  background-color:#313A3D;
  position:relative;
  line-height:50px;
  font-size:18px;
  transition: all 0.3s ease-in-out,width 0.5s ease-in-out;
  text-transform:uppercase;
}
#formContact .contactChamp:nth-child(3) label{transition: all 0.3s ease-in-out, width 0.7s ease-in-out;}
#formContact .contactChamp:nth-child(4) label{transition: all 0.3s ease-in-out, width 0.9s ease-in-out;}
#formContact .contactChamp:nth-child(5) label{transition: all 0.3s ease-in-out, width 1.1s ease-in-out;}
#formContact .contactChamp:nth-child(6) label{transition: all 0.3s ease-in-out, width 1.3s ease-in-out;}


div:hover label, div input:focus + label,div textarea:focus + label, .labelOuvert{
  width:20%;
}
div input:focus + label,div textarea:focus + label{
  background-color:rgb(116, 181, 89);
  color:#313A3D;
}

input[type=submit]{
  background-color:#313A3D;
  border:0;
  height:50px;
  padding:0 20px;
  text-transform:uppercase;
  color:rgb(116, 181, 89);
  font-size:15px;
  margin-top:35px;
}

textarea{
  resize: none;
  padding-top:18px;
  transition:all 0.3s ease-in-out;
}
textarea + label{
  top:-54px;
}
textarea:focus, .messOuvert textarea{
  height:150px;
}

textarea:focus + label,.messOuvert label{
  top:-154px;
  height:150px;
  line-height:150px;
}
.messOuvert{
  margin-bottom:100px
}

/*
  rgb(199, 64, 63) ROUGE
  rgb(120,164,240) BLEU
  rgb(116, 181, 89) VERT
*/


@media screen and (max-width: 1070px) {

  form{
    width:100%;
  }
  form div{
    width:90%;
  }

}
    </style>
     <script>
        $('input,textarea').blur(function () { // En sortant d'un champ du Form (désélection)

if($(this).siblings('label').attr('for')=='msg'){ // Si c'est le textarea Message
      $(this).parent().css('margin-bottom','0'); // On retire la marge (qui baisse le bouton submit)
}

if ( $(this).val() != '' ) { // Si le champs est rempli
  $(this).siblings('label').addClass('labelOuvert'); // On laisse le label en petit
  if($(this).siblings('label').attr('for')=='msg'){ // Si c'est le champ message
      $(this).parent().addClass('messOuvert'); // Ajout de la classe pour agrandir le champ
      $(this).parent().css('margin-bottom','100px'); // On baisse le bouton
  }
}
else {
  $(this).siblings('label').removeClass('labelOuvert');
  if($(this).siblings('label').attr('for')=='msg'){ // Si c'est le textarea Message
    $(this).parent().removeClass('messOuvert'); // Retrait de la classe pour reduire le champ
  }
}



});

$('textarea').focus(function () { // Au clic sur le textarea Message
if($(this).val() == ''){ // Si le champ est vide
$(this).parent().css('margin-bottom','100px'); // Rajout de la marge pour baisser le bouton submit
}
});
    </script>
  </head>
  <body style="background-color: darkgrey">