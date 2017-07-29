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
		$('#id_proceso_productivo').val("0");
	
		
	   $('#TableContainer').jtable({
        title: '<?php echo $ttl_bienvenido; ?>',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'proceso_productivo.nombre_proceso ASC ',	//cambio
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
          listAction: '../controlador/ctrl_grilla_procesos_productivos?action=lista_proceso_productivo',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'<?php echo $lbl_jt_pagingInfo; ?>',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'<?php echo $lbl_jt_pagingInfo; ?>',
				click: function () {
					opcion_usuario('registra_proceso_ptoductivo', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_proceso_productivo: {
            title: '<?php echo $tll_id_proceso_productivo; ?>',
			width: '5%',
            key: true,
            create: false,
            edit: false,
            width: '5%',
            list: false
          },

         nombre_proceso: {
            title: '<?php echo $tll_nombre_proceso; ?>',
			width: '10%',
            create: false,
            edit: false,
            list: true,
            width: '25%',
            defaultValue: '#'
          },

            nombre_tipo_pila: {
            title: '<?php echo $tll_nombre_tipo_pila; ?>',
            width: '10%',
            list: true,
            create: false,
            edit: false
          },
		  
         identificacion_de_pila: {
            title: '<?php echo $tll_identificacion_de_pila; ?>',
            width: '10%',
            list: true,
            create: false,
            edit: false
          },
		  
         identificacion_de_cama: {
            title: '<?php echo $tll_identificacion_de_cama; ?>',
            width: '10%',
            list: false,
            create: false,
            edit: false        
          },

         fecha_inicio: {
            title: '<?php echo $tll_fecha_inicio; ?>',
            width: '20%',
            list: true,
            create: false,
            edit: true            
          },
		  
		  fecha_finalizacion: {
            title: '<?php echo $tll_fecha_finalizacion; ?>',
            width: '20%',
            list: true,
            create: false,
            edit: true            
          },
		  
		  cantidad_terminada: {
            title: '<?php echo $tll_cantidad_terminada; ?>',
            width: '10%',
            list: true,
            create: false,
            edit: true            
          },
		  fecha_ficha_tecnica: {
            title: '<?php echo $tll_fecha_ficha_tecnica; ?>',
            width: '20%',
            list: true,
            create: false,
            edit: true            
          },
		  temperatura: {
            title: '<?php echo $tll_temperatura; ?>',
            width: '5%',
            list: true,
            create: false,
            edit: true            
          },
		  ph: {
            title: '<?php echo $tll_ph; ?>',
            width: '5%',
            list: true,
            create: false,
            edit: true            
          },
		  humedad: {
            title: '<?php echo $tll_humedad; ?>',
            width: '10%',
            list: true,
            create: false,
            edit: true            
          },

		  olor: {
            title: '<?php echo $tll_olor; ?>',
            width: '20%',
            list: true,
            create: false,
            edit: true            
          },
		  color: {
            title: '<?php echo $tll_color; ?>',
            width: '20%',
            list: true,
            create: false,
            edit: true            
          },
		  textura: {
            title: '<?php echo $tll_textura; ?>',
            width: '20%',
            list: true,
            create: false,
            edit: true            
          },
		  unidad_medida: {
            title: '<?php echo $$tll_unidad_medida; ?>',
            width: '10%',
            list: true,
            create: false,
            edit: true            
          },
		  observaciones: {
            title: '<?php echo $tll_observaciones; ?>',
            width: '30%',
            list: true,
            create: false,
            edit: true            
          },
		  
			btnEditar: {
				title: '<?php echo $tll_opcion; ?>',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (proceso_productivoData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_proceso_productivo', proceso_productivoData.record.id_proceso_productivo, '0', '');
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
				id_proceso_productivo: $('#id_proceso_productivo').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_proceso_productivo, tipo, id_entidad)
		{
			ventana1('frm_proceso_productivo.php?action='+action+'&id_usu='+id_proceso_productivo+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos del Proceso Productivo ');
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
					<select id="id_proceso_productivo" name="id_proceso_productivo" class="box1"  title="<?php echo $ttl_pag; ?>"  style="width:545px;cursor:pointer;" >	
						<option value=''>:.</option >
							<?php
								$query="SELECT
									  tipo_proceso.nombre_proceso
									FROM
									  $db.proceso_productivo
									  INNER JOIN tipo_proceso ON proceso_productivo.id_tipo_proceso =
												 tipo_proceso.id_tipo_proceso ";
								$result = $conex->Execute($query);
								while(!$result->EOF)
									{
										echo "<option value='".$result->fields['nombre_proceso']."'>".utf8_encode($result->fields['nombre_proceso'])."</option >";
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