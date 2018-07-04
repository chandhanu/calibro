<?php

$equipment=$_GET['EquipmentName'];
if($equipment=='Autoclave')
    header('Location:Autoclave.php');
if($equipment=='Stethoscope')
    header('Location:Stethoscope.php');
else
   echo $equipment." bff....No Such Equipments";
?>