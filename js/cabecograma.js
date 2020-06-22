$(document).ready(function() {
					// se passar o mouse no participante 1, esconde os outros nomes e aparece o dele
					$('ul li img.1').hover(function() {
						$('.nome .0,h1.2,h1.3,h1.4,h1.5,h1.6,h1.7,h1.8,h1.9,h1.10').css("display","none");
						$('h1.1').css("display","block");
						$('h1.1').text('Junior Almeida');
					});
					$('ul li img.1').mouseout(function() { 
						$('h1.1').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 2, esconde os outros nomes e aparece o dele
					$('ul li img.2').hover(function() {
						$('.nome .0,h1.1,h1.3,h1.4,h1.5,h1.6,h1.7,h1.8,h1.9,h1.10').css("display","none");
						$('h1.2').css("display","block");
						$('h1.2').text('Capixaba XXL');
						
					});
					$('ul li img.2').mouseout(function() { 
						$('h1.2').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 3, esconde os outros nomes e aparece o dele
					$('ul li img.3').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.4,h1.5,h1.6,h1.7,h1.8,h1.9,h1.10').css("display","none");
						$('h1.3').css("display","block");
						$('h1.3').text('Rodrigo Lemos');
					});
					$('ul li img.3').mouseout(function() { 
						$('h1.3').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 4, esconde os outros nomes e aparece o dele
					$('ul li img.4').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.5,h1.6,h1.7,h1.8,h1.9,h1.10').css("display","none");
						$('h1.4').css("display","block");
						$('h1.4').text('Henrique');
					});
					$('ul li img.4').mouseout(function() { 
						$('h1.4').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 5, esconde os outros nomes e aparece o dele
					$('ul li img.5').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.4,h1.6,h1.7,h1.8,h1.9,h1.10').css("display","none");
						$('h1.5').css("display","block");
						$('h1.5').text('Norton');
					});
					$('ul li img.5').mouseout(function() { 
						$('h1.5').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 6, esconde os outros nomes e aparece o dele
					$('ul li img.6').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.7,h1.8,h1.9,h1.10').css("display","none");
						$('h1.6').css("display","block");
						$('h1.6').text('Caio Rodrigues');
					});
					$('ul li img.6').mouseout(function() { 
						$('h1.6').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 7, esconde os outros nomes e aparece o dele
					$('ul li img.7').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.6,h1.8,h1.9,h1.10').css("display","none");
						$('h1.7').css("display","block");
						$('h1.7').text('Bruno Mancha');
					});
					$('ul li img.7').mouseout(function() { 
						$('h1.7').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 8, esconde os outros nomes e aparece o dele
					$('ul li img.8').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.6,h1.7,h1.9,h1.10').css("display","none");
						$('h1.8').css("display","block");
						$('h1.8').text('Holiver');
					});
					$('ul li img.8').mouseout(function() { 
						$('h1.8').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 9, esconde os outros nomes e aparece o dele
					$('ul li img.9').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.6,h1.7,h1.8,h1.10').css("display","none");
						$('h1.9').css("display","block");
						$('h1.9').text('Vigab');
					});
					$('ul li img.9').mouseout(function() { 
						$('h1.9').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					// se passar o mouse no participante 10, esconde os outros nomes e aparece o dele
					$('ul li img.10').hover(function() {
						$('.nome .0,h1.1,h1.2,h1.3,h1.4,h1.5,h1.6,h1.7,h1.8,h1.9').css("display","none");
						$('h1.10').css("display","block");
						$('h1.10').text('Guto Abravanel');
					});
					$('ul li img.10').mouseout(function() { 
						$('h1.10').css("display","none");
						$('.nome .0').css("display","block");
					});
					
					
				});