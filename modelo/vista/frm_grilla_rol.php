<?php
include('../../include/vars.php');
include('frm_cabecera.php');  
//include('../etiquetas/esp/lbl_frm_rol.php');  

?>
<head>
	<?php 
		include('archivos_grilla.php'); 
		include('script_modelo.php'); 
	?>
  <script type="text/javascript">
    $(document).ready(function () {	
		
		//al iniciar dejar las cajas de texto en ceros
		$('#id_rol').val("0");
	
		
	   $('#TableContainer').jtable({
        title: '<?php echo $ttl_title; ?>',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'rol.nombre_rol ASC ',	//cambio
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
          listAction: '../controlador/ctrl_grilla_rol.php?action=lista_rol',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'<?php echo $ttl_tooltip; ?>',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'<?php echo $ttl_text; ?>',ttl_text
				click: function () {
					opcion_usuario('registra_rol', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_rol: {
            title: '<?php echo $ttl_id_rol; ?>',
			width: '10%',
            key: true,
            create: false,
            edit: false,
            width: '10%',
            list: false
          },

          nombre_rol: {
            title: '<?php echo $ttl_nombre_rol; ?>',
			width: '20%',
            create: false,
            edit: false,
            list: true,
            width: '25%',
            defaultValue: '#'
          },  
		  
			btnEditar: {
				title: '<?php echo $ttl_opcion; ?>',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (rolData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_rol', rolData.record.id_rol, '0', '');
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
				id_rol: $('#id_rol').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_rol, tipo, id_entidad)
		{
			ventana1('frm_rol.php?action='+action+'&id_usu='+id_rol+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos de Rol');
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
			<tr><td colspan='3' ><?php echo $ttl_title; ?></td></tr>
			<tr>
				<td ><?php echo $ttl_bienvenido; ?></td>
			</tr>
			<tr>
				<td>
					<select id="id_rol" name="id_rol" class="box1"  title="<?php echo $ttl_bienvenido; ?>"  style="width:545px;cursor:pointer;" >	
						<option value=''>:.</option >
							<?php
								$query="SELECT  id_rol, nombre_rol
										FROM  	$db.rol ";
								$result = $conex->Execute($query);
								while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_rol']."'>".utf8_encode($result->fields['nombre_rol'])."</option >";
										$result->MoveNext();
									}
							?>
					</select>
				</td>
			</tr>
			<tr>
				<td >
					<button type="submit" id="LoadRecordsButton" ><?php echo $title_buscar; ?></button>				
				</td>
			</tr>
		</table>	
	</div>
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	<br>