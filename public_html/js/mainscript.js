$(".elenka_delete_button").on("click", function(e) {
    var idTarget = $(this).attr('data-target-id');
    $("#elenka_delete_confirm").attr('data-target-id',idTarget);
});
$("#elenka_delete_confirm").on("click", function (e) {
    var idTarget = $(this).attr('data-target-id');
    $.ajax({
        type: "POST",
        url: "arsip_reset",
        data: {id:idTarget},
        success: function(){
            location.reload()
        }
    });
});

function updateStatusSoal(id){
    var data = {id:id}
    $.ajax({
        type: "POST",
        url: "soal_active",
        data: data
    });
}
$(".elenkaSoalView").on('click', function(e) {
    var idTarget = $(this).attr('data-target-id');
    $("#soalview").load('soal_view/'+idTarget);
});