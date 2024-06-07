@extends('layouts.website')
@section('content')

<x-hero-slider :slides=$slides />

<x-posts :section1=$section1 :section2=$section2 :section3=$section3 />

@endsection