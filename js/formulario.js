$( document ).ready(function() {

	function ordenacionInicialAdjuntos(){
		
		var	$adjuntos = $(".listado-adjuntos").children(".item");

		$adjuntos.sort(function(a,b){
			var an = a.querySelector("input[id^='orden']").value;
			var	bn = b.querySelector("input[id^='orden']").value;

			if(an > bn) {
				return 1;
			}
			if(an < bn) {
				return -1;
			}
			return 0;
		});

		$adjuntos.detach().appendTo($(".listado-adjuntos"));
	}

	ordenacionInicialAdjuntos();

	function ordenacion(){
		$(".listado-adjuntos").find("input[id^='orden']").each(function(i){
	    	 	$(this).attr("value",i);
	    	 });

	    $(".listado-adjuntos").sortable({
	    	items:".item",
        handle:".handle",
	    	update: function(event, ui) {
	    	 $(this).find("input[id^='orden']").each(function(i){
	    	 	$(this).attr("value",i);
	    	 });    
	    }

	    });
	}

	ordenacion();
	
//    $( ".listado-adjuntos" ).disableSelection();

	var enlaces = $('.enlace-evento');
	if (enlaces.length != 0){
		$('.titulo-enlaces').css('display','block'); 
	}

	var adjuntos = $('.adjunto-evento');
	if (adjuntos.length != 0){
		$('.titulo-adjuntos').css('display','block'); 
	}

	$('.formulario-edicion-evento').on('click', '.borrar-enlace', function(event) {
		event.preventDefault();
		$(this).parent().closest('.enlace-evento').remove();
	});

	$('.formulario-edicion-evento').on('click', '.borrar-adjunto', function(event) {
		event.preventDefault();
		$(this).parent().closest('.adjunto-evento').remove();
	});	

	$('.formulario-edicion-evento').on('click', '.borrar-geolocalizacion', function(event) {
		event.preventDefault();
		$(this).parent().closest('.geolocalizacion-evento').remove();
	});	

	$('input.gllpSearchField').keypress(function( event ) {
		  if ( (event.which == 13) || (event.which == 10)) {
		     event.preventDefault();
		     $(this).submit();
		  }
	});

//	$('.gllpMap').sortable('disable');
/*	$('.gllpMap').hover(
			function(){
				$(this).parent('.geolocalizacion-evento').draggable('disable').sortable('disable').removeClass('item');
			},
			function(){
				$(this).parent('.geolocalizacion-evento').draggable('enable').sortable('disable').addClass('item');
			}
	);
*/

	$(".nuevo-enlace").click(function(event) {
		event.preventDefault();
		var n_enlaces = $('.listado-adjuntos').children('.enlace-evento').size();
		var div_enlace = "<div class='enlace-evento  ccm-pane ccm-pane-body item'><a href='' class='borrar-enlace btn danger'>Borrar</a><div class='clearfix form-group'><label class='control-label'>Título</label>\
		<input id='titulo[]' type='text' name='titulo[]' value='' class='ccm-input-text'></div><div class='clearfix form-group'><label class='control-label'>Enlace</label>\
		<input id='enlace[]' type='text' name='enlace[]'	value='' class='ccm-input-text'></div>\
			<input id='orden[]' type='hidden' name='orden[]' value='' class='ccm-input-text'>\
					</div>";
		// var ultimo_enlace = $(this).closest('.listado-adjuntos').children('.enlace-evento').last();
		// if(ultimo_enlace.length == 0){
		// 	ultimo_enlace = $(this).closest('.listado-adjuntos').children('.titulo-adjuntos');
		// 	//	ultimo_enlace.css('display','block'); 
		// }
		$(".listado-adjuntos").append(div_enlace);
		
		$(this).closest('.listado-adjuntos').on('click', '.borrar-enlace', function(event) {
			event.preventDefault();
			$(this).parent().closest('.enlace-evento').remove();
		});
		ordenacion();
	});

	

	$(".nuevo-geolocalizacion").click(function(event) {
		event.preventDefault();
		var div_geolocalizacion = '<div class="geolocalizacion-evento  ccm-pane ccm-pane-body">\
    		<div class="clearfix form-group">\
    		<a href="" class="borrar-geolocalizacion btn danger">Borrar</a>\
    		<div class="clearfix form-group"><label class="control-label">Título</label>\
		    <input id="titulo_geolocalizacion[]" type="text" name="titulo_geolocalizacion[]" value="" class="ccm-input-text"></div>\
    		<div class="clearfix form-group"><label class="control-label">Descripción</label>\
		    <input id="descripcion_geolocalizacion[]" type="textarea" name="descripcion_geolocalizacion[]" value="" class="ccm-input-text"></div>\
    		<div class="clearfix form-group"><label class="control-label">Dirección</label>\
		    <input id="direccion_geolocalizacion[]" type="textarea" name="direccion_geolocalizacion[]" value="" class="ccm-input-text"></div>\
			<fieldset class="gllpLatlonPicker">\
				<input type="text" class="gllpSearchField">\
				<input type="button" class="gllpSearchButton" value="Busca">\
				<input id="orden_geolocalizacion[]" type="hidden" name="orden_geolocalizacion[]" value="" class="ccm-input-text">\
				<br/>\
				<div class="gllpMap">Google Maps</div>\
				lat/lon: <input type="text" class="gllpLatitude" value="20"/> / <input type="text" class="gllpLongitude" value="20"/>, zoom: <input name="zoom[]" id="zoom[]" type="text" class="gllpZoom" value="3"/> <input type="button" class="gllpUpdateButton" value="Actualiza mapa">\
			</fieldset>\
		</div>';

		$(".listado-adjuntos").prepend(div_geolocalizacion);
		
		$(this).closest('.listado-adjuntos').on('click', '.borrar-geolocalizacion', function(event) {
			event.preventDefault();
			$(this).parent().closest('.geolocalizacion-evento').remove();
		});

		$(".gllpLatlonPicker").each(function() {
			(new GMapsLatLonPicker()).init( $(this) );
		});
		ordenacion();
	});




	////////////////////////////////////////////////////desplegable aytos


    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .attr("name", "municipio")
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        // this._on( this.input, {
        //   autocompleteselect: function( event, ui ) {
        //     ui.item.option.selected = true;
        //     this._trigger( "select", event, {
        //       item: ui.item.option
        //     });
        //   },
 
        //   autocompletechange: "_removeIfInvalid"
        // });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });

 
    $(function() {
      $( "#municipio" ).combobox();
      // $( "#toggle" ).click(function() {
      //   $( "#combobox" ).toggle();
      // });
    });

});
