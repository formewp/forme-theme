@extends('layouts.main', ['logoUrl' => $logoUrl])
@section('content')
    @if ($image)
        <!-- Hero Image -->
        <section>
            <div class="container">
                <img src="{{ $image }}" class="img-fluid" alt="Hero image">
            </div>
        </section>
    @endif
    <!-- Title -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 text-center">
                    <h1>@title()</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 main">
                    @content()
                </div>
            </div>
        </div>
    </section>
@endsection
