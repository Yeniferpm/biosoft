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
		$('#id_regional').val("0"); 			
		$('#id_centro').val(""); 

	   //Al seleccionar un dato en el select regional, se procede a cargar el select
	   //centros.
	   $('#id_regional').change(function(){
			$.post("../controlador/ctrl_combos.php",{
				action       : 'buscar_centros',
				id_regional  : $('#id_regional').val()
			},function(data){
				$("#id_centro").html(data.centros);
			},'json');
			
			$("#ventana1").dialog({
				autoOpen: false,
				modal: true,
				closeOnEscape: true
			});
			
		});		
		
	   $('#TableContainer').jtable({
        title: 'LISTA AREAS REGISTRADAS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'nombre_area ASC',	//cambio
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
          data.deleteConfirmMessage = '<?php echo "Esta seguro que desea elimianr el registro : "; ?>' + data.record.id_area + '?';
        },

        actions: {
          // listAction: '../controlador/ctrl_grilla_areas.php?action=ocultar_div',
          listAction: '../controlador/ctrl_grilla_areas.php?action=lista_areas',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },

		toolbar: {
			items: [{
				tooltip: 	'Haga click aqui para agregar una nueva area',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Nueva Area',
				click: function () {
					opcion_usuario('registra_area', '', '0', '');
				}
			}]
		},
 
		fields: {
          id_area: {
            title: 'Id',
            key: true,
            create: false,
            edit: true,
            width: '10%',
            list: false
          },

          nombre_area: {
            title: 'Area',
            create: false,
            edit: false,
            list: true,
            width: '25%',
            defaultValue: '#'
          },

          id_centro: {
            title: 'Id Centro',
            width: '20%',
            list: false,
            create: false,
            edit: false,
          },
		  
         nombre_centro: {
            title: 'Centro',
            width: '30%',
            list: true,
            create: false,
            edit: false,
            maxLength: 30,
            fieldSize: 30,
            
          },		  

         id_regional: {
            title: 'Regional',
            width: '30%',
            list: false,
            create: false,
            edit: false,
            
          },
		  
         nombre_regional: {
            title: 'Nombre Regional',
            width: '30%',
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
				display: function (areasData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_area', areasData.record.id_area, '0', '');
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
				id_regional: $('#id_regional').val(),
				id_centro: $('#id_centro').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action, id_usu, tipo, id_entidad)
		{
			ventana1('frm_areas.php?action='+action+'&id_usu='+id_usu+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos de Area');
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
			<tr><td colspan='3' >LISTA DE AREAS INGRESADAS</td></tr>
			<tr>
				<td >REGIONAL</td>
				<td>CENTROS</td>
			</tr>
			<tr>
				<td>
					<select type="text"  align='left' id='id_regional' name='id_regional' class="box-gray"  title="<?php echo $title_centros; ?>" required="" style="width:545px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="select id_regional, nombre_regional from regional;";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_regional']."'>".utf8_encode($result->fields['nombre_regional'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
				</td>
				<td>
					<select type="text" class="box-gray" id='id_centro' name='id_centro'   title="<?php echo $title_centros; ?>" style="width:545px;cursor:pointer;"/>	
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