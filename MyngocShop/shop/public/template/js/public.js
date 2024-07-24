$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function LoadMore()
{
    const page = $('#page').val();
    $.ajax({
        type:'POST',
        dataType:'JSON',
        data: {page},
        url: '/services/load-product',
        success : function (result){
            if(result.html !== ''){
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
            }else{
                alert('Đã load xong sản phẩm');
                $('#button-loadMore').css('display','none');
            }
        }
    })
}
$(document).ready(function() {
    // Hiển thị sidebar
    $('.js-show-sidebar').on('click', function() {
        $('.js-sidebar').addClass('show-sidebar');
    });

    // Ẩn sidebar
    $('.js-hide-sidebar').on('click', function() {
        $('.js-sidebar').removeClass('show-sidebar');
    });

    // Giảm số lượng sản phẩm
    $('.btn-num-product-down').on('click', function() {
        var numProduct = Number($(this).next().val());
        if(numProduct > 0) {
            $(this).next().val(numProduct - 1);
        }
    });

    // Tăng số lượng sản phẩm
    $('.btn-num-product-up').on('click', function() {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    // Hàm cập nhật số lượng giỏ hàng
    function updateCartCount() {
        $.ajax({
            url: '/cart-count',
            method: 'GET',
            success: function(response) {
                $('.js-show-cart').attr('data-notify', response.count);
            },
            error: function(xhr) {
                console.error('Lỗi khi lấy số lượng giỏ hàng:', xhr);
            }
        });
    }

    // Gọi hàm này khi cần cập nhật số lượng giỏ hàng
    updateCartCount();
});
