
@include('layouts.fontend.inc.header')

@yield('content')




<!-- Card Modal -->
<div class="modal fade bd-example-modal-lg" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><h4 id="Pname"></h4></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img width="100%" height="100%" src="" id="Pimage" alt="cardImg">
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="margin-top: 10px">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong id="productSellingPrice"></strong> <del id="productDIscountPprice"></del>  </li>
                                <li class="list-group-item">Product Code: <strong id="Pcode"></strong></li>
                                <li class="list-group-item">Product Category: <strong id="Pcategory"></strong></li>
                                <li class="list-group-item">Stock:
                                    <span class="badge badge-pill" style="background:green" id="stockIn"></span>
                                    <span id="stockOut"  style="background:red" class="badge badge-pill"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="colorArea">
                            <label for="color">Color</label>
                            <select class="form-control" id="color"></select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="size" class="mt-3">Size</label>
                            <select class="form-control" id="size"></select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" class="form-control" value="1" min="1">
                        </div>
                        <input type="hidden" id="product_id">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-lg btn-warning" onclick="addToCard()">Add To Card</button>
            </div>
        </div>
    </div>
</div>

@include('layouts.fontend.inc.footer')

<script type="text/javascript">


    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function cardView(id){
        $.ajax({
            type:"GET",
            dataType:"json",
            url:"/product/card/view/"+id,
            success: function(response){
                $("#Pname").text(response.product.product_name_en);
                $("#Pcode").text(response.product.product_code);
                $("#Pcategory").text(response.product.category.category_name_en);
                $("#Pstock").text(response.product.product_qty);
                $("#Pimage").attr('src','/'+response.product.product_thumbnail);
                $("#product_id").val(id);
                $("#quantity").val(1);
                $("#color").empty();
                $("#size").empty();
                $.each(response.color, function(key, value){
                    if(response.color == ""){
                        $("#colorArea").hide();
                    }else {
                        $("#colorArea").show();
                    }
                    $("#color").append('<option '+value+' >'+value+'</option>');
                });
                $.each(response.size, function(key, value){
                    $("#size").append('<option '+value+' >'+value+'</option>');
                    if(response.size == ""){
                        $("#sizeArea").hide();
                    }else {
                        $("#sizeArea").show();
                    }
                });

                // price settings
                if(response.product.discount_price == null){
                    $("#productSellingPrice").empty();
                    $("#productDIscountPprice").empty();
                    $("#productSellingPrice").text(response.product.selling_price);
                }else {
                    $("#productSellingPrice").empty();
                    $("#productDIscountPprice").empty();
                    $("#productSellingPrice").text(response.product.discount_price);
                    $("#productDIscountPprice").text(response.product.selling_price);
                }

                // product quantity
                if(response.product.product_qty > 0){
                    $("#stockIn").empty()
                    $("#stockOut").empty()
                    $("#stockIn").text('StockIn');
                }else {
                    $("#stockOut").empty()
                    $("#stockIn").empty()
                    $("#stockOut").text('StockOut');
                }

            }
        })
    }

    function addToCard(){
        var name = $("#Pname").text();
        var id = $("#product_id").val();
        var color = $("#color option:selected").text();
        var size = $("#size option:selected").text();
        var quantity = $("#quantity").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{
                color:color,
                size:size,
                quantity:quantity,
                productName: name,
            },
            url:'/product/card/add/'+id,
            success: function(response){
                viewMiniCard()
                $("#cardModal").modal('hide');
                toastr.success("Card Added Success");
            },
            error: function(error){
                toastr.error("Something went wrong! Card not added");
            }
        })
    }

    // view mini card
    function viewMiniCard(){
        $.ajax({
            type:'GET',
            dataType: 'json',
            url: '/ProductMiniCardView/',
            success: function(response){
                $("#miniCartQuantity").text(response.cartQty);
                $("#miniCartTotal").text(response.cartTotal);
                var miniCardData = "";
                $.each(response.carts, function(key, value){
                    miniCardData += `
                        <div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="image">
                                        <a href="detail.html"><img src="/${value.options.image}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
                                    <div class="price">${value.price}$</div>
                                </div>
                                <div class="col-xs-1 action">
                                    <button type="submit" id="${value.rowId}" onclick="miniCartRemoveFun(this.id)" ><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>

                    `
                });
                $("#miniCart").html(miniCardData);
            }
        });
    }
    viewMiniCard();

    // mini cart remove
    function miniCartRemoveFun(rowId){
        $.ajax({
            type:"GET",
            dataType:'json',
            url:'/miniCartRemove/'+rowId,
            success:function(){
                viewMiniCard();
                toastr.success("Cart remove success");
            },
            error:function(){
                toastr.error("Opps! card not removed");
            }
        })
    }
</script>
