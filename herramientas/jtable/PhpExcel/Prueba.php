<?php
include("excelwriter.inc.php");  
x$excel=new ExcelWriter("FicheroExcel.xls");
if($excel==false) 
	{   
        echo $excel->error;
	}
	
	$myArr=array("ID_FACTURA","ID_PRESTADOR","NOM_PRESTADOR","COD_CUPS","NOMBRE_CUPS","VALOR_TARIFA","CANTIDAD","VALOR_AUTORIZACION","NUMERO_DE_ORDEN","NOM_ORDENADOR","REGISTRADO_POR","FECHA_ING");
	$excel->writeLine($myArr);

	$sql="SELECT id_roll, nom_roll FROM roll";

	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res))
		{
			$excel->writeRow();
			$excel->writeCol($[id_roll]);
			$excel->writeCol($row[nom_roll]);			
		}
	echo "Exito.";	
	$excel->close();	
?> 