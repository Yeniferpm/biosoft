var App = function () {
  return {
    init: function (options) {
      /*VERTICAL MENU*/
      $(".cl-vnavigation li ul").each(function(){
        $(this).parent().addClass("parent");
      });

      $(".cl-vnavigation").delegate(".parent > a","click",function(e){
        var ul = $(this).parent().find("ul");
        ul.slideToggle(300, 'swing', function () {
          var p = $(this).parent();
          if(p.hasClass("open")){
            p.removeClass("open");
          }else{
            p.addClass("open");
          }
        });
        e.preventDefault();
      });

    },
  };
}();

$(function() {
	$( "#btnSalir" ).click(function() {
		$.post("include/controlSession.php", { action: 'salir' }, function(data){
			if (data.Resultado=='OK'){
				window.location.reload();
			}
			else {
				alert(data.Mensaje);
			}
		}, 'json');
	});

});

