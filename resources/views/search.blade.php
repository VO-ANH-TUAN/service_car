@extends('main')
@section('content')
    <!-- Product -->
 
    <section class="bg0 p-t-23 p-b-140 mt-5">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5 mt-3 mb-3" style="font-family: Arial, Helvetica, sans-serif; font-style: inherit">
                   Sản phẩm tìm thấy
                </h3>
                
            </div>
            

            <div  id="loadProduct">
                <div class="row isotope-grid">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <a href="/san-pham/{{$product->id}}-{{\Str::Slug($product->name,'-')}}.html"><img  src="{{$product->thumb}}" alt="IMG-PRODUCT" style="width:200px;height:200px"></a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="/san-pham/{{$product->id}}-{{\Str::Slug($product->name,'-')}}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->name}}
                                        </a>

                                        <span class="stext-105 cl3">
								{!!\App\Helpers\Helper::price($product->price,$product->price_sale)!!}
								</span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>

    </section>

@endsection
