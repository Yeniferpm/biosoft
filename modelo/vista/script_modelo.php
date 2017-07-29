		<link 	rel="stylesheet" type="text/css" media="all" 	href="../../herramientas/jquery/themes/redmond/jquery.ui.all.css" />
		<link 	rel="stylesheet" type="text/css" media="all" 	href="../../herramientas/jqueryslidemenu/jqueryslidemenu.css" />
		<script type="text/javascript" 							src="../../herramientas/jqueryslidemenu/jqueryslidemenu.js"></script>
		<script type="text/javascript" 							src="../../herramientas/jquery/js/ui/jquery-ui.custom.js"></script>		
		<script type="text/javascript">
					$(document).ready(function() {
						
					   $("#ventana1").dialog({
						   autoOpen: false,
						   modal: true,
						   closeOnEscape: true
					   });

					});
					
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