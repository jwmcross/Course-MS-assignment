$('#deleteModal').on('shown.bs.modal', function(e){
    var $route = (e.relatedTarget).getAttribute('data-href');
    $('.delconfirm').attr('action',$route);
});

$('#deleteModal').on('hidden.bs.modal', function(e){
    $('.delconfirm').attr('action','');
});
