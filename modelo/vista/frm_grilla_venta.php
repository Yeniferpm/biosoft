<?php
//para los aprendices
//deben poner en funcionamiento el lbl_frm_grilla.php, segun el lenguaje seleccionado.
include('../../include/vars.php');
include('frm_cabecera.php');  
?>
<head>
<link rel="stylesheet" href="../../css/cajas_style.css" type="text/css"/>
	<?php 
		include('archivos_grilla.php'); 
		include('script_modelo.php'); 
	?>
  <script type="text/javascript">
    $(document).ready(function () {	
		//dejar las cajas de texto en ceros
		$('#id_producto').val("0"); 			
	
		
	   $('#TableContainer').jtable({
        title: 'LISTA VENTAS REGISTRADAS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'ventas.id_ventas ASC',	//cambio
        paging: true,
        columnSelectable: true,
        columnSelectable: true,
        defaultDateFormat: 'yy-mm-dd',
        multiselect: false,
        openChildAsAccordion: true,
        multiSorting: true,

        messages: {
			serverCommunicationError: '<?php echo $lbl_jt_serverCommunicationError; ?>',
			loadingMessage: '<?php echo $lbl_jt_loadingMessage; ?>',
			noDataAvailable: '<?php echo $lbl_jt_noDataAvailable; ?>',
			addNewRecord: '<?php echo $lbl_jt_addNewRecord; ?>',
			editRecord: '<?php echo $lbl_jt_editRecord; ?>',
			areYouSure: '<?php echo $lbl_jt_areYouSure; ?>',
			deleteConfirmation: '<?php echo $lbl_jt_deleteConfirmation; ?>',
			save: '<?php echo $lbl_jt_save; ?>',
			saving: '<?php echo $lbl_jt_saving; ?>',
			cancel: '<?php echo $lbl_jt_cancel; ?>',
			deleteText: '<?php echo $lbl_jt_deleteText; ?>',
			deleting: '<?php echo $lbl_jt_deleting; ?>',
			error: '<?php echo $lbl_jt_error; ?>',
			close: '<?php echo $lbl_jt_close; ?>',
			cannotLoadOptionsFor: '<?php echo $lbl_jt_cannotLoadOptionsFor; ?>',
			pagingInfo: '<?php echo $lbl_jt_pagingInfo; ?>',
			canNotDeletedRecords: '<?php echo $lbl_jt_canNotDeletedRecords; ?>',
			deleteProggress: '<?php echo $lbl_jt_deleteProggress; ?>',
			pageSizeChangeLabel: '<?php echo $lbl_jt_pageSizeChangeLabel; ?>',
			gotoPageLabel: '<?php echo $lbl_jt_gotoPageLabel; ?>'
        },

        deleteConfirmation: function(data) {
          // data.deleteConfirmMessage = '<?php echo "Esta seguro que desea elimianr el registro : "; ?>' + data.record.id_area + '?';
        },

        actions: {
          // listAction: '../controlador/ctrl_grilla_areas.php?action=ocultar_div',
          listAction: '../controlador/ctrl_grilla_ventas.php?action=lista_ventas',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },
		
		toolbar: {
		items:[{
				tooltip: 	'Haga click aqui para agregar una nueva venta',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Nueva venta',
				click: function () {
				opcion_usuario('registra_ventas', '', '0', '');
				}
			}]
		},
		
		fields: {
          id_ventas: {
            title: 'N° ventas',
            key: true,
            create: false,
            edit: true,
            width: '10%',
            list: true,
			defaultValue: '#'
          },

          fecha: {
            title: 'Fecha',
            width: '15%',
            list: false,
            create: false,
            edit: false
          },
		  
		  id_producto: {
            title: 'Id producto',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		  nombre_producto: {
            title: 'Nombre producto',
            width: '20%',
            list: true,
            create: false,
            edit: true 
          },
		   
         cantidad_ventas: {
            title: 'Cantidad ventas',
            width: '20%',
            list: false,
            create: false,
            edit: false
          },      
		  
		   id_cantidad_producto: {
            title: 'Id cantidad producto',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		   cantidad_producto: {
            title: 'Cantidad producto disponible',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		   id_unidad_medida: {
            title: 'Id unidad medida',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		   unidad_medida: {
            title: 'Unidad medida',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		
		   id_precio: {
            title: 'Id precio',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		  precio_producto: {
            title: 'Valor unitario',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		    total_apagar: {
            title: 'Total pagar',
            width: '20%',
            list: false,
            create: false,
            edit: false
          },
		  
		   id_usuario: {
            title: 'Responsable venta',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		    recibe: {
            title: 'Recibe',
            width: '30%',
            list: false,
            create: false,
            edit: true 
          },
		  
		   observacion_venta: {
            title: 'Observacion',
            width: '30%',
            list: true,
            create: false,
            edit: true 
          },
		  
			btnEditar: {
				title: 'Opcion',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (ventasData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_ventas', ventasData.record.id_ventas, '0', '');
					});
					return $img;
				}
			}
		},

        formCreated: function (event, data) {
          data.form.validationEngine();
        },

        formSubmitting: function (event, data) {
          return data.form.validationEngine('validate');
        },

        formClosed: function (event, data) {
          data.form.validationEngine('hide');
          data.form.validationEngine('detach');
        }
      });

      $('#LoadRecordsButton').click(function (e) {	
			e.preventDefault();
			$('#TableContainer').jtable('load', {
				id_producto: $('#id_producto').val()
				
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_ventas, tipo, id_entidad)
		{
			ventana1('frm_ventas.php?action='+action+'&id_usu='+id_ventas+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Agregar Datos de venta');
		}
	

	function ventana1(strURL, strWidth, strHeigth, strTitle){
		$("#ventana1").html('<iframe id="popup1" width="100%" height="100%"  marginWidth="0" marginHeight="0" frameBorder="0" scrolling="auto" />').dialog("open");
		$("#popup1").attr("src", strURL);
		$( "#ventana1" ).dialog({ width: strWidth });
		$( "#ventana1" ).dialog({ height: strHeigth });
		$( "#ventana1" ).dialog({ title: strTitle });
		$( "#ventana1" ).dialog( "option", "position", 'center' );
		$( "#ventana1" ).dialog( "open" )
		}	
			
  </script>
  </head>
	<div id="ventana1"></div>
	<div id='div_opciones' style="text-align:center;margin-left:auto; margin-right:auto;width:100%;" >
		<table  width='50%' align='center' >
			<tr><td colspan='2' >LISTA DE VENTAS INGRESADAS</td></tr>
			<tr>
				<td>PRODUCTOS</td>
			</tr>
			<tr>
				<td>
					<select type="text"  align='left' id='id_producto' name='id_producto' class="box-gray"  title="centro" required="" style="width:545px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="SELECT
									  productos.nombre_producto, productos.id_producto
									FROM
									  productos;";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_producto']."'>".utf8_encode($result->fields['nombre_producto'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='2' >
					<button type="submit" id="LoadRecordsButton" class="btn btn-navy">BUSCAR</button>				
				</td>
			</tr>
		</table>	
	</div>
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	<br>
	 <div id="site_info">
			<p>
				<img src="../../imagenes/logo_pie.png" width='15px' height='15px'/>
				Sena Centro Agropecuario Regional Cauca - Proyecto Creado por el Tecnologo de ADSI - 1135869 CEAP 3 - 2017
			</p>
		</div>
