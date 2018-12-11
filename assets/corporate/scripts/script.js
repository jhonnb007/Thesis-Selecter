// checked label active
$(document).on('click', 'label', function() {
    if($('input:checkbox:checked')) {
        $('input:checkbox:checked', this).closest('label').addClass('active');
    }
});

$('#openBtn').click(function(){
	$('#myModal').modal({show:true})
});