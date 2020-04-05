$(".elenkaDeleteButton").on("click", function(e) {
    var c = confirm('Ingin mereset paket soal?');
    
    if(c == true){
        var idTarget = $(this).attr('data-target-id');
        
        $.ajax({
            type: "POST",
            url: "arsip_reset",
            data: {id:idTarget},
            success: function(){
                location.reload()
            }
        });
    }
})

// $(".elenkaUpdateSoalStatus").on("click", function (e) {
//     console.log('check');
// });

function updateStatusSoal(id)
{
    
    var data = {
        id:id
    }

    $.ajax({
        type: "POST",
        url: "soal_active",
        data: data
    });

    console.log('check :'+id);
}

$(".elenkaSoalView").on('click', function(e) {
    var idTarget = $(this).attr('data-target-id');
    $("#soalview").load('soal_view/'+idTarget);
})