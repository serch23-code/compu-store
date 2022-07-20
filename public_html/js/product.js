$(document).ready(function () {
    console.log("App is working");
    $("#insert").hide();

    fetchTasks();

    function fetchTasks() {
        $.ajax({
            url: '../php/controller/product.php?option=all',
            type: 'GET',
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (response) {
                $("#loading").hide();
                var response = JSON.parse(response);
                let template = '';
                response.forEach(product => {
                    template += `
                    <div class="column" productid="${product.id}">
                    <h2>${product.name}</h2>
                    <p class="price">$${product.price}</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                    <hr>
                    <button type="button" class="btn-buy" id="product-detail">Ver</button>
                        </div>    
                    `;
                });
                $('#products').html(template);
            }
        });
    }

    $(document).on('click', '#product-detail', (e) => {
        const element = $(this)[0].activeElement.parentElement;
        const prdouctID = $(element).attr('productid');
        console.log("button", prdouctID)
        var url = "productDetail.html?p=" + encodeURIComponent(prdouctID);
        window.location.href = url;
    });

    $("#product-detail").click(function () {

    });


    $(document).on('click', '#add-products', (e) => {
        $.ajax({
            url: '../php/controller/product.php?option=insertProd',
            type: 'POST',
            beforeSend: function () {
                $("#insert").show();
            },
            success: function () {
                console.log("exitoso");
                $("#insert").hide();
            }
        })
    });
});