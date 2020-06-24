$(function () {
    /**
     * get products
     */

    $(".menu__item_cat button").on("click", function () {
        $(".menu__item_cat button").removeClass("active");
        $(this).addClass("active");
        let id = $(this).attr("data-id");
        if (id == "all") {
            showProducts(id);
        } else {
            showProducts(id);
        }
    });

    function showProducts(id) {
        $.ajax({
            url: "admin/get_products.php",
            type: "post",
            data: {
                cat: id,
            },
            success: function (data) {
                let arr = JSON.parse(data);
                createProductCard(arr);
            },
        });
    }
    showProducts((id = "all"));

    /**
     * show products
     */
    function createProductCard(array) {
        let products = $(".products");
        $(products).html("");
        for (let i = 0; i < array.length; i++) {
            let div = document.createElement("div");
            $(div).addClass("product__card");
            $(div).html(`
				<div class="product__image">
					<img src="admin/${array[i]["image"]}" alt="">
				</div>
				<div class="product__name">
					<h4>${array[i]["name"]}</h4>
				</div>
				<div class="product__description">
					<p>${array[i]["description"]}</p>
				</div>
				<div class="product__footer">
					<div class="product__price">
						<p>${array[i]["price"]}</p><span>${array[i]["currency"]}</span>
					</div>
					<div class="product__buy">
						<button class="add__basket" prod-id="${array[i]["id"]}">add basket</button>
					</div>
				</div>`);
            $(products).append(div);
        }

        /**
         * show basket
         */
        $(".show__basket").on("click", () => {
            $(".basket").css("display", "flex");
        });
        $(".close__basket").on("click", () => {
            $(".basket").css("display", "none");
        });

        /**
         * add product to basket
         */
        $(".add__basket").on("click", function () {
            let id = $(this).attr("prod-id");
            $.ajax({
                url: "admin/add_product_basket.php",
                type: "get",
                data: {
                    id: id,
                    action: "add",
                },
                success: function (data) {

                },
            });
        });

        $(".count_prod").on("change", function () {
            let count = $(this).val();
            let id = $(this).parents("tr").attr("id");
            $.ajax({
                url: "admin/add_product_basket.php",
                type: "get",
                data: {
                    id: id,
                    count: count,
                    action: "update",
                },
                success: function (data) {
                    location.reload();
                },
            });
        });

        /**
         * delete product to basket
         */
        $('.delete').on('click', function () {
            let id = $(this).attr('date-id');
            $.ajax({
                url: "admin/add_product_basket.php",
                type: "get",
                data: {
                    id: id,
                    action: "delete",
                },
                success: function (data) {
                    location.reload();
                },
            });
        });
        /**
         * buy products
         */
        $('.buy__products').on('click', () => {
            $.ajax({
                url: "admin/orders.php",
                type: "get",
                data: {},
                success: function (data) {
                    $('.success__buy_body').css('display', 'flex');
                },
            });
        });
        $('.success__buy_body').on('click', function () {
            $(this).css('display', 'none');
        })
    }
});