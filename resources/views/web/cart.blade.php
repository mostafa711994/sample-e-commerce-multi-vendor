@extends('web.layout.app')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Shopping Cart</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->



<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody id="data">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

@push('js')

    <script>
        $(document).ready(function(){

            var items = localStorage.getItem('product_id')

            // for(var i=0; i<=items.length; i++){
                $.each(JSON.parse(items),function (key,val) {
                    $("#data").append(`
            <tr>
                <td>
                            <div class="media">

                                <div class="media-body">
                                    <p>`+val.name+`</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>`+val.price+`</h5>
                        </td>
                        <td>
                            <div class="product_count">
                                <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                       class="input-text qty">

                            </div>
                        </td>
                        <td>
                            <h5>`+val.price+`</h5>
                        </td>
            <tr/>
                `)
                })

            // }





        })
    </script>

@endpush
