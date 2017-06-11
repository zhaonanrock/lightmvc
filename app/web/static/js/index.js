$('.btn-danger').click(function(){
    var id = $(this).attr('attr');
    alert(id);
    jQuery.ajax({
        type:'post',
        url:'destroy',
        data:{"id":id},
        success:function(){
            alert("Delete Success");
            window.location.reload();
        }
    });
});