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
  <script type="text/javascript">
    $(document).ready(function () {	
		
		//al iniciar dejar las cajas de texto en ceros
		$('#id_producto').val("0");
	
		
	   $('#TableContainer').jtable({
        title: '<?php echo $ttl_bienvenido; ?>',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'productos.id_producto ASC ',	//cambio
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
          listAction: '../controlador/ctrl_grilla_productos.php?action=lista_productos',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'<?php echo $ttl_tooltip; ?>',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'<?php echo $tll_text; ?>',
				click: function () {
					opcion_usuario('registra_producto', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_producto: {
            title: '<?php echo $tll_id_producto; ?> ',
			width: '10%',
            key: true,
            create: false,
            edit: false,
            width: '10%',
            list: true
          },

          nombre_producto: {
            title: '<?php echo $tll_nombre_producto; ?>',
			width: '20%',
            create: false,
            edit: false,
            list: true,
            width: '25%',
            defaultValue: '#'
          },

           tipo_producto: {
            title: '<?php echo $tll_tipo_producto; ?>',
            width: '25%',
            list: true,
            create: false,
            edit: false
          },
		  
		   categoria: {
            title: '<?php echo $tll_categoria; ?>',
            width: '25%',
            list: true,
            create: false,
            edit: false
          },
		  
			btnEditar: {
				title: '<?php echo $tll_Opcion; ?>',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (productoData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_producto', productoData.record.id_producto, '0', '');
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
	
	function opcion_usuario(action, id_producto, tipo, id_entidad)
		{
			ventana1('frm_productos.php?action='+action+'&id_usu='+id_producto+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos del Producto');
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
			<tr><td colspan='3' ><?php echo $ttl_bienvenido; ?></td></tr>
			<tr>
				<td ><?php echo $ttl_pag; ?></td>
			</tr>
			<tr>
				<td>
					<select id="id_producto" name="id_producto" class="box1"  title="<?php echo $ttl_pag; ?>"  style="width:545px;cursor:pointer;" >	
						<option value=''>:.</option >
							<?php
								$query="SELECT  id_producto, nombre_producto
										FROM  	$db.productos ";
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
				<td >
					<button type="submit" id="LoadRecordsButton" ><?php echo $title_buscar; ?></button>				
				</td>
			</tr>
		</table>	
	</div>
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	<br>