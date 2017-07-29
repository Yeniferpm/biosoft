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
		$('#id_centro').val("0"); 			
		$('#id_area').val(""); 
	

	   //Al seleccionar un dato en el select centro, se procede a cargar el select
	   //areas.
	   $('#id_centro').change(function(){
			$.post("../controlador/ctrl_combos.php",{
				action       : 'buscar_areas',
				id_centro  : $('#id_centro').val()
			},function(data){
				$("#id_area").html(data.areas);
			},'json');
			
			$("#ventana1").dialog({
				autoOpen: false,
				modal: true,
				closeOnEscape: true
			});
			
			
		});		
		
	   $('#TableContainer').jtable({
        title: 'LISTA PROGRAMAS REGISTRADOS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'programa_formacion.id_programa ASC',	//cambio
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
          listAction: '../controlador/ctrl_grilla_programa.php?action=lista_programa',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },
		toolbar: {
		items:[{
				tooltip: 	'Haga click aqui para agregar una nueva programa',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Nuevo programa',
				click: function () {
				opcion_usuario('registra_programa', '', '0', '');
				}
			}]
		},
		fields: {
          id_programa: {
            title: 'Id programa',
            key: false,
            create: false,
            edit: true,
            width: '20%',
            list: false,
			defaultValue: '#'
          },

          nombre_programa: {
            title: 'programa',
            width: '40%',
            list: true,
            create: false,
            edit: false
          
          },
		   
          id_area: {
            title: 'id_area',
            width: '20%',
            list: false,
            create: false,
            edit: false
          },
		  
         nombre_area: {
            title: 'area',
            width: '30%',
            list: true,
            create: false,
            edit: false,
            maxLength: 30,
            fieldSize: 30
          },		  
         id_centro: {
            title: 'id_centro',
            width: '30%',
            list: false,
            create: false,
            edit: false
          },
         nombre_centro: {
            title: 'centro',
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
				display: function (programaData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_programa', programaData.record.id_programa, '0', '');
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
				id_centro: $('#id_centro').val(),
				id_area: $('#id_area').val()
				});
		  });
      $('#LoadRecordsButton').click();
	  
    });
	
	function opcion_usuario(action,id_programa, tipo, id_entidad)
		{
			ventana1('frm_programa.php?action='+action+'&id_usu='+id_programa+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Actualizar Datos de ficha');
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
			<tr><td colspan='2' >LISTA DE PROGRAMAS INGRESADOS</td></tr>
			<tr>
				<td >CENTROS</td>
				<td>AREAS</td>
			</tr>
			<tr>
				<td>
					<select type="text"  align='left' id='id_centro' name='id_centro' class="box-gray"  title="centro" required="" style="width:545px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="select id_centro, nombre_centro from centro;";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_centro']."'>".utf8_encode($result->fields['nombre_centro'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
				</td>
				<td>
					<select type="text"  id='id_area' name='id_area' class="box-gray" title="area" style="width:545px;cursor:pointer;"/>	
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
