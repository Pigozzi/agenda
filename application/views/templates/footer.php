

			<script src="<?= base_url('assets/js/jquery.js')?>"></script>
			<script src="<?= base_url('assets/js/popper.min.js')?>"></script>
			<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
			<script src="<?= base_url('assets/js/script.js')?>"></script>
			<script src="<?= base_url('assets/js/datatables.js')?>"></script>
	</body>

	<script>

	$(document).ready(function(){

		$('.col-calendario').click(function(e){
			var dia = $(this).find('.day').text();
			var mes = $('.calendario').find('h3').text().split(' ')[0];
			var mes_text = mes;
			var ano = $('.calendario').find('h3').text().split(' ')[1];

			switch(mes){

				case 'Janeiro':
					mes = '01';
					break;
				case 'Fevereiro':
					mes = '02';
					break;
				case 'Março':
					mes = '03';
					break;
				case 'Abril':
					mes = '04';
					break;
				case 'Maio':
					mes = '05';
					break;
				case 'Junho':
					mes = '06';
					break;
				case 'Julho':
					mes = '07';
					break;
				case 'Agosto':
					mes = '08';
					break;
				case 'Setembro':
					mes = '09';
					break;
				case 'Outubro':
					mes = '10';
					break;
				case 'Novembro':
					mes = '11';
					break;
				case 'Dezembro':
					mes = '12';
					break;
			}

			$.ajax({
	        url : "<?= site_url('Eventos/loadEventsByDay/')?>" + dia + '/' + mes + '/' + ano,
	        type: "GET",
	        dataType: "JSON",
	        success: function(eventos) {

				$('#eventsDay tbody').empty();
				$.each(eventos, function(index, evento){
					$('#eventsDay tbody').append('<tr><td>'+ evento.titulo+'</td><td>'+ evento.local+'</td><td>'+evento.horaInicio+'</td><td>'+evento.horaTermino+'</td></tr>');
				});

				$('#carregaEvento .modal-title').text('Eventos ' + dia + ' de ' + mes_text + ' de ' + ano );
	            $('#carregaEvento').modal('show');
	        },
			
	    });

		});

	});

	</script>
</html>
