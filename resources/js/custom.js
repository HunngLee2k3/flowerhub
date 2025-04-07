// custom.js
document.addEventListener('DOMContentLoaded', function () {
    // Thêm hiệu ứng khi thêm vào giỏ hàng
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            this.textContent = 'Đã thêm!';
            setTimeout(() => {
                this.textContent = 'Thêm vào giỏ';
            }, 1000);
        });
    });
});