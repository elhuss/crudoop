
// js for delete product
$(document).on('click', 'delete-object', function(){
    var id = $(this).attr('delete-id');
    bootbox.confirm({
        message:"<h4>Are You Sure?</h4>",
        buttons:{
            confirm:{
                label: '<span class="glyphicon glyphicon-ok"></span>Yes',
                className:'btn-danger'
            },
            cancel:{
                label: '<span class="glyphicon glyphicon-remove"></span> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if(result==true){
                $.post('delete_product.php', {
                    object_id: id
                },function(data) {
                    location.reload();
                }).fail(function(){
                    alert('Unable to Delete.');
                });
            }
        }
    });
    return false;

});

