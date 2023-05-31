@extends('main')

@section('content')
<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
		<div class="container">
            @foreach($services as $key => $service )
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
                            {{$service->name}}
						</h3>

						<p class="stext-113 cl6 p-b-26">
                           {!! $service->content !!}
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div >    <!--class="how-bor1 "-->
{{--						<div class="hov-img0">--}}
{{--							<img src="{{$service->thumb}}" alt="IMG" style="height:400px;width: 400px;margin-top:30px ">--}}
{{--						</div>--}}
					</div>
				</div>
			</div>
            @endforeach

		</div>
	</section>
@endsection
