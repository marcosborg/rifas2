@extends('layouts.website')

@section('content')
<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="page-title">Marketplace Causas.App</h2>
            </div>
        </div>

        <div class="row">

            <div class="col-3">
                <div class="card">
                    <div class="card-header text-bg-success">
                        Categorias de produtos
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach ($product_categories as $product_category)
                        <a class="list-group-item" href="#">{{ $product_category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($companies as $company)
                            <div class="col-2">
                                <div class="card">
                                    <img src="{{ $company->logo->getUrl() }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $company->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-4">
                                <div class="card">
                                    <img src="{{ $product->photo->getUrl() }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h1>{{ $product->price }} <span class="small">€</span></h1>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
@section('styles')
    <style>
        span.small {
            font-size: 80%;
        }
    </style>
@endsection