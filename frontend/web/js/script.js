$(function() {
	//добавляем товар вкорзину
	$('.add-cart').click(function(e) {  //взаимод. с CartController.php
		e.preventDefault();

		var product_id = $(this).data('id');

		$.ajax ({
			url: 'http://yii:81/cart/add',  //cart - имя контрлоллера  add - имя акшена в этом контроллекре (CartController.php)
			type: 'POST',
			data: {id: product_id },

			success: function(res) {
				//console.log(res);
				showCart(res);
			},
			error: function() {
				alert('ERROR!!');
			}

		});

	});

	function showCart (res) { //вызываем мод.окно с товарами купленными нами
		$('#cart .modal-body').html(res);
		$('#cart').modal(); //открываем бутстраповское мод.окно
	}

	//очистить корзину - удаляем сессию
	$('.clear-cart').click(function(e) {  //взаимод. с CartController.php
		e.preventDefault();

		$.ajax ({
			url: 'http://yii:81/cart/clear',  //cart - имя контрлоллера  add - имя акшена в этом контроллекре (CartController.php)
			type: 'POST',
			success: function(res) {
				//console.log(res);
				showCart(res);
			},
			error: function() {
				alert('ERROR!!');
			}

		});
	});


	//клик на кнопку удалить одиночный товар из корзины
	$('.modal-body').on('click', '.del-product', function(e) { //alert('rtryty');
		e.preventDefault();

		var product_id = $(this).data('id');

		$.ajax ({
			url: 'http://yii:81/cart/del',  //cart - имя контрлоллера  add - имя акшена в этом контроллекре (CartController.php)
			type: 'POST',
			data: {id: product_id },

			success: function(res) {
				//console.log(res);
				showCart(res);
			},
			error: function() {
				alert('ERROR!!');
			}
		});
	});


	//показываем
	$('.showCart').click(function(e) {  //взаимод. с CartController.php
		e.preventDefault();

		$.ajax ({
			url: 'http://yii:81/cart/show',  //cart - имя контрлоллера  add - имя акшена в этом контроллекре (CartController.php)
			type: 'POST',
			success: function(res) {
				//console.log(res);
				showCart(res);
			},
			error: function() {
				alert('ERROR!!');
			}

		});
	});

});