@extends('frontend.layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
			
			<div class="aiz-user-panel">
				@yield('panel_content')
            </div>
        </div>
    </div>
</section>
@endsection