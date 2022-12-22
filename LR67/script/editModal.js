$('#edit').on('show.bs.modal', function(event) {
	var button=$(event.relatedTarget) // Button that triggered the modal
	var recipient=button.data('id') // Extract info from data-* attributes
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal=$(this)


	let tr=button.parents('tr');
	let title=tr.find('.crud-title').text();
	let desc=tr.find('.crud-desc').text();
	let price=tr.find('.crud-price').text();
	let category=tr.find('.crud-category').text();
	modal.find('.crud-title-input').val(title);
	modal.find('.crud-desc-input').val(desc);
	modal.find('.crud-price-input').val(price);
	modal.find('.crud-category-input').val(category).change()
	modal.find('.crud-id-input').val(recipient);

})
$('#delete').on('show.bs.modal', function(event) {
	var button=$(event.relatedTarget) // Button that triggered the modal
	var recipient=button.data('id') // Extract info from data-* attributes
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal=$(this)

	modal.find('.crud-id-input').val(recipient);
	// console.log(modal.find('.crud-city-input').val(city))
	// modal.find('.modal-title').text('New message to ' + recipient)
	// modal.find('.modal-body input').val(recipient)
})

