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

$(".elenkaSoalView").on('click', function(e) {
    var idTarget = $(this).attr('data-target-id');
    $("#soalview").load('soal_view/'+idTarget);
})