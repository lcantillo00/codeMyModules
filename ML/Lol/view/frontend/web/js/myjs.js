$(document).on('change','#country',function() {
    var param = 'country='+$('#country').val();
    $.ajax({
        showLoader: true,
        url: YOUR_URL_HERE,
        data: param,
        type: "GET",
        dataType: 'json'
    }).done(function (data) {
        //data.value has the array of regions
    });
});