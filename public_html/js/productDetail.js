$(document).ready(function () {

    var url = window.location.href;
    var productID = url.split('p=').pop();

    getByID();

    function getByID() {
        $.ajax({
            url: '../php/controller/product.php?option=id',
            type: 'POST',
            data: { productID },
            beforeSend: function () {

            },
            success: function (response) {
                var response = JSON.parse(response);

                let template = `
                <div class="card-title">${response.name}</div>
                <div class="card-body">
                    <img src="./assets/laptop.webp" >
                    <div class="comments">
                        <p class="detail">${response.specification}</p>
                    </div>
                </div>
                <div class="pie">
                    <a href="index.html">Comprar</a>
                </div>
                `;

                $('#product').html(template);
            }
        });
    }
});