function formatPriceVND(price){
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",");
    //120000 => 120,000
}

document.addEventListener("DOMContentLoaded",function(){
    var formatElements = document.querySelectorAll('.format_price');
    //Lay tat ca cac phan tu co class = "format_price";
    formatElements.forEach(function(element){
        var getPrice =parseInt(element.textContent,10);
        var formatPrice = formatPriceVND(getPrice);
        element.textContent = formatPrice + " đ";
    });
});

///onchange="soluongchange(this)"
function soluongchange(obj){
    //obj = doi tuong cua the input, div, a, span
    let soluong = $(obj).val();//gia tri cua doi tuong khi thay doi.
    let id = $(obj).attr('tan_id');//attr = attribute = lay thuoc tinh cua doi tuong thong qua ten goi
    console.log(soluong)
    console.log(id)
    $.ajax({
        url: 'ajax-action', // The URL to your CodeIgniter route
        type: 'POST', // or 'GET'
        dataType: 'json', // Response data type
        data: { id: id, soluong: soluong}, // Data to send to the server
        success: function(response) {
            // Handle the response here
            //console.log(response);
            $('#parent_container2').html(response.cart_list);
            //$('#parent_container2').html("123");
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });
}
