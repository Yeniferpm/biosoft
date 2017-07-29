<?php
include('../../include/vars.php');
include('frm_cabecera.php');  
?>
<head>
	<?php 
		include('archivos_grilla.php'); 
		include('script_modelo.php'); 
	?>
  <script type="text/javascript">
    $(document).ready(function () {	
		
		//al iniciar dejar las cajas de texto en ceros
		$('#id_depto').val("0");
	
		
	   $('#TableContainer').jtable({
        title: 'LISTA REGIONALES REGISTRADAS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'municipio.nombre_municipio ASC ',	//cambio
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
          listAction: '../controlador/ctrl_grilla_regional.php?action=lista_regionales',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'Haga click aqui para agregar una nueva Regional',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Nueva Regional',
				click: function () {
					opcion_usuario('registra_regional', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_municipio: {
            title: 'Id municipio',
			width: '10%',
            key: false,
            create: false,
            edit: false,
            width: '10%',
            list: false
          },

          nombre_municipio: {
            title: 'Municipio',
			width: '20%',
            create: false,
            edit: false,
            list: true,
            width: '25%',
            defaultValue: '#'
          },

          id_depto: {
            title: 'Id Depto',
            width: '10%',
            list: false,
            create: false,
            edit: false
          },
		  
         nombre_depto: {
            title: 'Departamento',
            width: '30%',
            list: true,
            create: false,
            edit: false
          },
		  
         id_regional: {
            title: 'Id Regional',
            width: '10%',
            list: false,
            create: false,
            edit: false        
          },

         nombre_regional: {
            title: 'Regional',
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
				display: function (regionalesData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar esta regional'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_regional', regionalesData.record.id_municipio, '0', '');
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
				id_depto: $('#id_depto').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_municipio, tipo, id_entidad)
		{
			ventana1('frm_regional.php?action='+action+'&id_usu='+id_municipio+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos de Regional');
		}	
	//no mover Funcion Venta1 
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
			<tr><td colspan='3' >LISTA DE REGIONALES INGRESADAS</td></tr>
			<tr>
				<td >DEPARTAMENTO</td>
			</tr>
			<tr>
				<td>
					<select id="id_depto" name="id_depto" class="box1"  title="Depto"  style="width:545px;cursor:pointer;" >	
						<option value=''>:.</option >
							<?php
								$query="SELECT  id_depto, nombre_depto
										FROM  	$db.departamento ";
								$result = $conex->Execute($query);
								while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_depto']."'>".utf8_encode($result->fields['nombre_depto'])."</option >";
										$result->MoveNext();
									}
							?>
					</select>
				</td>
			</tr>
			<tr>
				<td >
					<button type="submit" id="LoadRecordsButton" >Buscar</button>				
				</td>
			</tr>
		</table>	
	</div>
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	<br>