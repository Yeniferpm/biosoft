<?php
//para los aprendices
//deben poner en funcionamiento el lbl_frm_grilla.php, segun el lenguaje seleccionado.
include('../../include/vars.php');
include('frm_cabecera.php');  
?>
<head>
	<?php 
		include('archivos_grilla.php'); 
		include('script_modelo.php'); 
	?>
	 <link rel="stylesheet" type="text/css" href="../../css/css_cajas_btn.css" media="screen" />
  <script type="text/javascript">
    $(document).ready(function () {	
		//dejar las cajas de texto en ceros
		$('#id_area').val("0"); 			
		$('#id_unidad').val(""); 

	   //Al seleccionar un dato en el select regional, se procede a cargar el select
	   //centros.
	   $('#id_area').change(function(){
			$.post("../controlador/ctrl_combos.php",{
				action       : 'buscar_unidades',
				id_area  : $('#id_area').val()
			},function(data){
				$("#id_area").html(data.azas);
			},'json');
			
			$("#ventana1").dialog({
				autoOpen: false,
				modal: true,
				closeOnEscape: true
			});
			
		});		
		
	   $('#TableContainer').jtable({
        title: 'LISTA MATERIA PRIMA E INSUMOS REGISTRADOS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'azas_ins ASC',	//cambio
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
          data.deleteConfirmMessage = '<?php echo "Esta seguro que desea elimianr el registro : "; ?>' + data.record.id_unidad + '?';
        },

        actions: {
          // listAction: '../controlador/ctrl_grilla_areas.php?action=ocultar_div',
          listAction: '../controlador/ctrl_grilla_materia_prima.php?action=lista_azas',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'Haga click aqui para agregar una nueva unidad',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Dato Nuevo',
				click: function () {
					opcion_usuario('registra_azas', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_materia_prima_insumos: {
            title: 'Id',
            key: true,
            create: false,
            edit: true,
            width: '3%',
            list: true
          },
		  
		  id_azas_ins: {
            title: 'Id Azas e Insumos',
            key: true,
            create: false,
            edit: true,
            width: '%',
            list: false
          },

          azas_ins: {
            title: 'Azas Insumos',
            create: false,
            edit: false,
            list: true,
            width: '10%',
            defaultValue: '#'
          },

          id_tipo_ingreso: {
            title: 'Id tipo ingreso',
            width: '10%',
            list: false,
            create: false,
            edit: false,
          },
		  
         nombre_tipo_ingreso: {
            title: 'Formato Ingreso',
            width: '10%',
            list: true,
            create: false,
            edit: false,
            
            
          },		 
		  id_unidad: {
            title: 'Id unidad',
            width: '8%',
            list: false,
            create: false,
            edit: false,
          },
		  
         nombre_unidad: {
            title: 'Unidad',
            width: '8%',
            list: true,
            create: false,
            edit: false,
            maxLength: 30,
            fieldSize: 30,
            
          },		  

         fecha_ingreso: {
            title: 'Fecha Ingreso',
            width: '8%',
            list: true,
            create: false,
            edit: false,
            
          },
		  
         hora_ingreso: {
            title: 'Hora Ingreso',
            width: '8%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		 cantidad: {
            title: 'Cantidad',
            width: '5%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		 id_unidad_medida: {
            title: 'Medida',
            width: '5%',
            list: false,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
 
          },
		  unidad_medida: {
            title: 'Medida',
            width: '5%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		  quien_entrega: {
            title: 'Quien Entrega',
            width: '8%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		  id_usuario: {
            title: 'Id Usu',
            width: '5%',
            list: false,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		  n_documento: {
            title: 'Numero Documeto',
            width: '10%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		  proveedor: {
            title: 'Proveedor',
            width: '8%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
		  observaciones: {
            title: 'Observaciones',
            width: '5%',
            list: true,
            create: false,
            edit: true,
            maxLength: 30,
            fieldSize: 30,
            
          },
			btnEditar: {
				title: 'Opcion',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (materia_primaData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_materia_prima', materia_primaData.record.materia_prima, '0', '');
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
				id_area: $('#id_area').val(),
				id_unidad: $('#id_unidad').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_materia_prima_insumos, tipo, id_entidad)
		{
			ventana1('frm_materia_prima.php?action='+action+'&id_usu='+id_materia_prima_insumos+'&tipo='+tipo+'&id_entidad='+id_entidad, '1400', '500', 'Actualizar Datos de unidad');
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
		<table  width='50%' align='' >
			<tr><td colspan='3' >LISTA TIPO MATERIA PRIMA E INSUMOS INGRESADOS</td></tr>
			<tr>
				<td >TIPO INGRESO</td>
				<td >AREAS</td>
				<td>UNIDADES</td>
			</tr>
			<tr>
				<td>
					<select type="text"  align='left' id='id_tipo_ingreso' name='id_tipo_ingreso' class="box-gray"  title="<?php echo $title_centros; ?>" required="" style="width:250px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="select tipo_ingreso.id_tipo_ingreso, 
										   tipo_ingreso.nombre_tipo_ingreso
									from $db.tipo_ingreso; ";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_tipo_ingreso']."'>".utf8_encode($result->fields['nombre_tipo_ingreso'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
				</td>
				<td>
					<select type="text"  align='left' id='id_area' name='id_area' class="box-gray"  title="<?php echo $title_centros; ?>" required="" style="width:250px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="select areas.id_area, areas.nombre_area 
									from $db.areas; ";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_area']."'>".utf8_encode($result->fields['nombre_area'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
				</td>
				<td>
					<select type="text" class="box-gray" id='id_unidad' name='id_unidad'   title="" style="width:250px;cursor:pointer;"/>	
					</select>	
				</td>
			</tr>
			<tr>
				<td colspan='3' >
					<button type="submit" id="LoadRecordsButton" class="box-gray" >Buscar</button>				
				</td>
			</tr>
		</table>	
	</div>
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	<br>
<?php include('pie_pag.php');	?>