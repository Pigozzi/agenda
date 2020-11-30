// Aguardar o carregamento total da página para rodar o Script;

$(document).ready(function(){
	$('#tabelaMeusEventos').DataTable();

    // Remove Placeholder;
    $('input,textarea').focus(function(){
    	$(this).data('placeholder',$(this).attr('placeholder'))
    			.attr('placeholder','');
    }).blur(function(){
       	$(this).attr('placeholder',$(this).data('placeholder'));
    });
    // Fim da remoção do Placeholder;

var options = [];

$( '.dropdown-item' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();

   console.log( options );
   return false;

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


// alert($('.col-calendario').height());
// var maxHeight = 0;
// $('.col-calendario').each(function(){

//   if($(this).height() > maxHeight) {
//     maxHeight = $(this).height();
//   }

// });

// $('.calendario-evento').each(function(){

//   if($(this).height() > maxHeight) {
//     maxHeight = $(this).height();
//   }

// });

// alert(maxHeight);


});
