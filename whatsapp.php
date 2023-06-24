<?php
require_once("./cabecalho.php");
?>

 <?php
// Fix Api Whatsapp on Desktops
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
// check if is a mobile
if ($iphone || $android || $palmpre || $ipod || $berry == true)
{
  header('Location: https://api.whatsapp.com/send?phone=5534988056758&text=Olá!%20Gostaria%20de%20obter%20maiores%20informações%20sobre%20agendamentos,%20valores%20e%20formas%20de%20pagamento.');
  //OR
  echo "<script>window.location='https://api.whatsapp.com/send?phone=5534988056758&text=Olá!%20Gostaria%20de%20obter%20maiores%20informações%20sobre%20agendamentos,%20valores%20e%20formas%20de%20pagamento.'</script>";
}
// all others
else {
  header('Location: https://web.whatsapp.com/send?phone=5534988056758&text=Olá!%20Gostaria%20de%20obter%20maiores%20informações%20sobre%20agendamentos,%20valores%20e%20formas%20de%20pagamento.');
  //OR
  echo "<script>window.location='https://web.whatsapp.com/send?phone=5534988056758&text=Olá!%20Gostaria%20de%20obter%20maiores%20informações%20sobre%20agendamentos,%20valores%20e%20formas%20de%20pagamento.'</script>";
}
?>