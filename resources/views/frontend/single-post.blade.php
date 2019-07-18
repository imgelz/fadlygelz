@extends('layouts.frontend')

@section('content')
<section class="ptb-0">
	<div class="mb-30 brdr-ash-1 opacty-5"></div>
	<div class="container">
		<a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i>Home<i class="mlr-10 ion-chevron-right"></i></a>
		<a class="mt-10" href="archive-page">Blog Archive<i class="mlr-10 ion-chevron-right"></i></a>
		<a class="mt-10 color-ash" href="single-post">Single Blog</a>
	</div><!-- container -->
</section>


<section>
	<div class="container">
		<div class="row">

				@foreach ($artikel as $data)
			<div class="col-md-12 col-lg-8">
				<img src="/assets/img/artikel/{{ $data->foto }}" style="width:350px">
				<h3 class="mt-30"><b>{{ $data->judul }} </b></h3>
				<ul class="list-li-mr-20 mtb-15">
					<li>by <a href="#"><b>{{Auth::user()->name}} </b></a> {{$data->created_at->format('d M Y')}}</li>
				</ul>
				
				<p>{{ $data->konten }}</p>
				
				<div class="float-left-right text-center mt-40 mt-sm-20">
			
					<ul class="mb-30 list-li-mt-10 list-li-mr-5 list-a-plr-15 list-a-ptb-7 list-a-bg-grey list-a-br-2 list-a-hvr-primary ">
						<li><a href="#"></a></li>
					</ul>
					
				</div><!-- float-left-right -->
			
				<div class="brdr-ash-1 opacty-5"></div>
				
				
			</div><!-- col-md-9 -->
			@endforeach
			
			<div class="d-none d-md-block d-lg-none col-md-3"></div>
			<div class="col-md-6 col-lg-4">
				<div class="pl-20 pl-md-0">

				</div><!--  pl-20 -->
			</div><!-- col-md-3 -->
			
		</div><!-- row -->
		
	</div><!-- container -->
</section>
@endsection