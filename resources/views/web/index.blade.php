@extends('web.layout.app')



@section('content')
<main class="site-main">



    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            @include('site.partials.notify')
            @if($errors->count() > 0)
                @foreach ($errors->all() as $error)
                    <span class="alert-danger">{{ $error }}</span>
                @endforeach
            @endif
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Trending <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{asset('web/img/login.jpg')}}" alt="">
                            <ul class="card-product__imgOverlay">

                                <li>
                                    <button data-id="{{$product->id}}" data-price="{{$product->price}}" data-name="{{$product->name}}" class="cart"><i class="ti-shopping-cart"></i></button>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <p>{{$product->name}}</p>
                            <h4 class="card-product__title"><a href="#">{{$product->description}}</a></h4>
                            <p class="card-product__price">{{$product->price}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ================ trending product section end ================= -->
    @include('web.login')
</main>
@endsection
@push('js')

    <script>
        $(document).ready(function(){
            var arr = [];
            $(document).on('click','.cart',function(e){
                    e.preventDefault()

                var id = $(this).data('id')
                var name = $(this).data('name')
                var price = $(this).data('price')

                arr.push({
                    id,
                    name,
                    price
                })

                $("#count").text(arr.length)


                localStorage.setItem('product_id',JSON.stringify(arr))

            })




        })
    </script>

@endpush
