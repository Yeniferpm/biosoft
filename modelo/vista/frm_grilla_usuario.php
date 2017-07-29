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
		$('#id_rol').val("0"); 			
	
		
	   $('#TableContainer').jtable({
        title: 'LISTA USUARIOS REGISTRADOS',	//Se cambia según el formualrio
        sorting: true,
        defaultSorting: 'registro_usuario.id_usuario ASC',	//cambio
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
          listAction: '../controlador/ctrl_grilla_usuario.php?action=lista_usuario',
          // deleteAction: '../controlador/ctrl_grilla_areas.php?action=elimina_usuario'
        },
		toolbar: {
		items:[{
				tooltip: 	'Haga click aqui para agregar un nuevo usuario',
				icon: 		'../../herramientas/jtable/themes/lightcolor/check.png',
				text: 		'Agregar Nuevo usuario',
				click: function () {
				opcion_usuario('registra_usuario', '', '0', '');
				}
			}]
		},
		fields: {
          codigo_ficha: {
            title: 'ficha',
            key: false,
            create: false,
            edit: false,
            width: '20%',
            list: false,
			defaultValue: '#'
          },

          id_usuario: {
            title: 'Id usuario',
            width: '10%',
            list: false,
            create: false,
            edit: false
          
          },
		  
          nombres: {
            title: 'Nombres',
            width: '25%',
            list: true,
            create: false,
            edit: false
          },
		  
         apellidos: {
            title: 'Apellidos',
            width: '25%',
            list: true,
            create: false,
            edit: false
         
          },

		n_documento: {
            title: 'Documento',
            create: false,
            edit: false,
            list: true,
            width: '20%'
          },	
		  
         celular: {
            title: 'Celular',
            width: '15%',
            list: false,
            create: false,
            edit: false
          },
         correo_usuario: {
            title: 'Correo',
            width: '30%',
            list: false,
            create: false,
            edit: false 
          },
		     clave: {
            title: 'Clave',
            width: '15%',
            list: false,
            create: false,
            edit: false 
          },
		     id_estado: {
            title: 'Id estado',
            width: '10%',
            list: false,
            create: false,
            edit: false 
          },
		     nombre_estado: {
            title: 'Estado',
            width: '15%',
            list: false,
            create: false,
            edit: false 
          },
		     id_tipo_documento: {
            title: 'Id tipo documento',
            width: '30%',
            list: false,
            create: false,
            edit: false
          },
		    nombre_tipo_documento: {
            title: 'Tipo documento',
            width: '20%',
            list: false,
            create: false,
            edit: false
          },
		    id_rol: {
            title: 'Id rol',
            width: '10%',
            list: false,
            create: false,
            edit: false 
          },
		    nombre_rol: {
            title: 'Rol',
            width: '15%',
            list: true,
            create: false,
            edit: false
          },
			btnEditar: {
				title: 'Opcion',
				width: '1%',
				sorting: false,
				edit: false,
				create: false,
				display: function (usuarioData) {
					var $img = $("<button class='jtable-command-button jtable-edit-command-button' title='Haga click aqui para editar este usuario'><span>Editar</span></button>");
					$img.click(function () {
						opcion_usuario('actualizar_usuario', usuarioData.record.id_usuario, '0', '');
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
	
	function opcion_usuario(action, id_usuario, tipo, id_entidad)
		{
			ventana1('frm_usuario.php?action='+action+'&id_usu='+id_usuario+'&tipo='+tipo+'&id_entidad='+id_entidad, '700', '360', 'Agregar Datos de usuario');
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
			<tr><td colspan='2' >LISTA DE USUARIOS INGRESADOS</td></tr>
			<tr>
				<td >ROL</td>
			</tr>
			<tr>
				<td>
					<select type="text"  align='left' id='id_rol' name='id_rol' class="box-gray"  title="programa" required="" style="width:545px;cursor:pointer;" />	
						<option value='0'>:.</option >
						<?php
							$query="select id_rol, nombre_rol from rol;";
							$result = $conex->Execute($query);
							while(!$result->EOF)
							{
								echo "<option value='".$result->fields['id_rol']."'>".utf8_encode($result->fields['nombre_rol'])."</option >";
								$result->MoveNext();
							}
						?>
					</select>
			</tr>
			<tr>
				<td colspan='2' >
					<button type="submit" id="LoadRecordsButton" class="btn btn-navy">Buscar</button>				
				</td>
			</tr>
		</table>
		
	</div>
	
	<div  id="TableContainer" style="margin-left:auto; margin-right:auto;width: 90%;"></div>
	 <div id="site_info">
			<p>
				<img src="../../imagenes/logo_pie.png" width='15px' height='15px'/>
				Sena Centro Agropecuario Regional Cauca - Proyecto Creado por el Tecnologo de ADSI - 1135869 CEAP 3 - 2017
			</p>
		</div>	
	<br>
