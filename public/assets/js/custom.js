$(function() {
	
	Init_custom_input_files();	
});

function Init_custom_input_files() {
	Set_custom_input_files();
	Set_custom_images_input_files()
}
function Set_custom_input_files() {
	var elements = $('.custom-file');
console.log('aqui');
	elements.each(function(c) {
		var element 	= $(this),
			parent 		= element.closest('.input-group'),
			label 		= element.find('.custom-file-label'),
			placeholder = label.text(),
			input 		= element.find('.custom-file-input'),
			data 		= input.data();
			objData 	= {
				input 		: input,
				label 		: label,
				parent 		: parent,
				placeholder : placeholder
			};

		input.data({ 'objDataFile': objData });

		element
			.after(
				$('<div/>', { class: 'input-group-append' })
				.append(
					$('<button/>', {
						text 	: 'Agregar', 
						class 	: 'btn btn-dark rounded-right add-button',
						type 	: 'button',
						data 	: objData
					})
				)
				.append(
					$('<button/>', {
						text 	: 'Cambiar', 
						class 	: 'btn btn-dark update-button hide',
						type 	: 'button',
						data 	: objData
					})
				)
				.append(
					$('<button/>', {
						text 	: 'Eliminar', 
						class 	: 'btn btn-danger delete-button hide',
						type 	: 'button',
						data 	: objData
					})
				)
			);

		var Methods = {
			change: function(objData) {
				if (objData.input.val()) {
					Methods.setValue(objData);
				} else {
					Methods.clean(objData);
				}
			},
			setValue: function(objData) {
				var fileName = objData.input[0].files[0].name;

				objData.parent.find('.add-button').hide();
				objData.parent.find('.update-button, .delete-button').show();
				objData.label.text(fileName);

				objData.input
					.trigger('setValue.fileInput', {
						el: objData.input,
						fieldContent: objData.element
					});
			},
			clean: function(objData) {
				objData.parent.find('.update-button, .delete-button').hide();
				objData.parent.find('.add-button').show();
				objData.label.text(objData.placeholder);
				objData.input.val('');

				objData.input
					.trigger('cleanValue.fileInput', {
						el: objData.input,
						fieldContent: objData.element
					});
			},
			proccessDelete: function(objData) {
				var data = objData.input.data();

				if (data.deleteAction) {
					var parameters = typeof data.parameters == 'object' ? data.parameters: {};
					parameters.type = data.deleteAction;

					objData.parent.loader('show');
					$.post(app.asyncFile, parameters, function(response) {
						if (response.status == 'OK') {
							Methods.delete(objData);
						}
						objData.parent.loader('hide');
					}, 'JSON');
				} else {
					Methods.delete(objData);
				}
			},
			delete: function(objData) {
				Methods.clean(objData);

				objData.input
					.trigger('deleteValue.fileInput', {
						el: objData.input,
						fieldContent: objData.element
					});
			}
		};

		if (data.value) {
			objData.parent.find('.add-button').hide();
			objData.parent.find('.update-button, .delete-button').show();
			objData.label.text(data.value.split('\\').pop().split('/').pop());
		}

		input.on('change', function() {
			Methods.change($(this).data('objDataFile'));
		});
		parent.find('.add-button , .update-button').on('click', function(e) {
			e.preventDefault();
			$(this).data('input').trigger('click');
			return false;
		});
		parent.find('.delete-button').on('click', function(e) {
			e.preventDefault();
			Methods.proccessDelete($(this).data());
			return false;
		});
		input.data({ fileMethods: Methods });
	}); 
}
function Set_custom_images_input_files(elContainer) {
	var elements =  $('.custom-file-image');

	elements.each(function(c) {
		var element 	= $(this),
			input 		= element.find('.custom-file-input'),
			data 		= input.data(),
			imgDefault 	= data.default,
			currentVal 	= imgDefault,
			textLegent	= data.suggestedDimensions || null,
			objData 	= {
				element 	: element,
				input 		: input,
				previousVal : data.value ? true: false
			};

		input
			.data({ 'objDataFile': objData})
			.addClass('d-none');

		if (data.value) {
			currentVal = data.value;
		}
		if (!textLegent && data.minDimensions) {
			var arrDimensions = data.minDimensions.split('x');
			textLegent    = data.minDimensions;
		}
		element
			.append($('<div/>', {
				class : 'file-legend',
				text  : textLegent || null
			}))
			.append(
				$('<div/>', { class: 'file-default' })
				.append(
					$('<img/>', {
						class 	: 'file-thumbnail',
						src 	: currentVal,
						data 	: { imgDefault: imgDefault }
					})
				)
			)
			.append($('<div/>', { class: 'file-preview hide' }))
			.append($('<div/>', {
				class : 'file-description',
				text  : data.description || null
			}))
			.append(
				$('<div/>', { class: 'file-buttons' })
				.append(
					$('<button/>', {
						text 	: 'Agregar', 
						class 	: 'btn btn-sm btn-dark w-100 add-button',
						type 	: 'button',
						data 	: objData
					})
				)
				.append(
					$('<button/>', {
						text 	: 'Cambiar', 
						class 	: 'btn btn-sm btn-dark w-100 update-button hide',
						type 	: 'button',
						data 	: objData
					})
				)
			);

		if (data.value) {
			objData.element.find('.add-button').hide();
			objData.element.find('.update-button').show();
		}

		var Methods = {
			change: function(objData) {
				if (objData.input.val()) {
					Methods.addPreview(objData);
				} else {
					Methods.clean(objData);
				}
			},

			addPreview: function(objData) {
				objData.element.find('.add-button').hide();
				objData.element.find('.update-button, .delete-button').show();

				if (objData.input.get(0).files && objData.input.get(0).files[0]) {
					var fileName 	  	= objData.input.get(0).files[0].name,
						previewElm 		= objData.element.find('.file-preview'),
						imgExtensions	= /(\.jpg|\.jpeg|\.png|\.gif|\.ico)$/i;

					if (fileName.match(imgExtensions)) {
						var reader = new FileReader();

						reader.onload = function(e) {
							previewElm
								.empty()
								.append($('<img/>', { src: e.target.result }));
						}
						reader.readAsDataURL(objData.input.get(0).files[0]);
					} else {
						previewElm
							.empty()
							.append($('<span/>', { text: fileName }));
					}
					objData.element.find('.file-default').addClass('hide');
					previewElm.removeClass('hide');

					objData.input
						.trigger('setValue', {
							el: objData.input,
							fieldContent: objData.element
						});
				}
			},
			clean: function(objData) {
				objData.element.find('.update-button').hide();
				objData.element.find('.add-button').show();
				
				objData.element.find('.file-preview').addClass('hide').empty();
				objData.element.find('.file-default').removeClass('hide');

				var imgDefault = objData.element.find('.file-default img.file-thumbnail');
				imgDefault.attr('src', imgDefault.data('imgDefault'));
				objData.input.val('');

				objData.input
					.trigger('cleanValue.fileInput', {
						el: objData.input,
						fieldContent: objData.element
					});
			},
			delete: function(objData) {
				Methods.clean(objData);

				objData.input
					.trigger('deleteValue.fileInput', {
						el: objData.input,
						fieldContent: objData.element
					});
			}
		};

		input.on('change', function() {
			Methods.change($(this).data('objDataFile'));
		});
		element.find('.add-button , .update-button').on('click', function(e) {
			e.preventDefault();
			$(this).data('input').trigger('click');
			return false;
		});
		input.data({ fileMethods: Methods });
	}); 
}
