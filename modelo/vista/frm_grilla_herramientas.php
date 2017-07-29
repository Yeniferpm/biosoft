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
		//dejar las cajas de texto en ceros
		$('#codigo_herramientas').val("0"); 			
		$('#nombre_herramienta').val(""); 

	   //Al seleccionar un dato en el select regional, se procede a cargar el select
	   //centros.
	   $('#codigo_herramientas').change(function(){
			$.post("../controlador/ctrl_combos.php",{
				action       : 'buscar_nombre_herramientas',
				 codigo_herramientas :  $('#codigo_herramientas').val()
			},function(data){
				$("#nombre_herramienta").html(data.herramientas);
			},'json');
			
			$("#ventana1").dialog({
				autoOpen: false,
				modal: true,
				closeOnEscape: true
			});
			
		});		
		
	   $('#TableContainer').jtable({
        title: 'LISTA HERRAMIENTAS REGISTRADAS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'id_herramientas ASC',	//cambio
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
          data.deleteConfirmMessage = '<?php echo "Esta seguro que desea elimianr el registro : "; ?>' + data.record.id_herramientas + '?';
        },

        actions: {
          // listAction: '../controlador/ctrl_grilla_areas.php?action=ocultar_div',
          listAction: '../controlador/ctrl_grilla_herramientas.php?action=lista_herramientas',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'Haga click aqui para agregar una nueva herramienta',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Nueva herramienta',
				click: function () {
					opcion_usuario('registra_herramientas', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_herramientas: {
            title: 'Id',
            key: true,
            create: false,
            edit: true,
            width: '10%',
            list: false
          },

          codigo_herramientas: {
            title: 'CODIGO ',
            create: false,
            edit: false,
            list: true,
            width: '25%',
            defaultValue: '#'
          },
		  id_herramientas: {
            title: 'Id',
            key: true,
            create: false,
            edit: true,
            width: '10%',
            list: false
          },
		  
         nombre_herramienta: {
            title: 'HERRAMIENTAS',
            width: '30%',
            list: true,
            create: false,
            edit: false,
            maxLength: 30,
            fieldSize: 30,
            
          },		 
		  
			btnEditar: {
				title: 'Opcion',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (herramientasData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_herramientas', herramientasData.record.id_herramientas, '0', '');
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
				id_herramientas: $('#id_herramientas').val(),
				nombre_herramienta: $('#nombre_herramienta').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_usu, tipo, id_entidad)
		{
			ventana1('frm_herramientas.php?action='+action+'&id_usu='+id_usu+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos de Herramientas');
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
			<tr><td colspan='3' >LISTA DE HERRAMIENTAS INGRESADAS</td></tr>
			<tr>
				<td >CODIGO</td>
				<td>NOMBRE</td>
			</tr>
			<tr>
				<td>
					<select type="text"  align='left' id='codigo_herramientas' name='codigo_herramientas' class="box1"  title="<?php echo $title_centros; ?>" required="" style="width:545px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="select id_herramientas, codigo_herramientas from herramientas ;";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_herramientas']."'>".utf8_encode($result->fields['codigo_herramientas'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
				</td>
				<td>
					<select type="text"  id='nombre_herramienta' name='nombre_herramienta'   title="<?php echo $title_centros; ?>" style="width:545px;cursor:pointer;"/>	
					</select>	
				</td>
			</tr>
			<tr>
				<td colspan='3' >
					<button type="submit" id="LoadRecordsButton" >Buscar</button>				
				</td>
			</tr>
		</table>	
	</div>
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	<br>
