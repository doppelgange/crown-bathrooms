@extends('layouts.backend.leftcol')
@section('content')
    <h1 class="page-header">Dashboard</h1>
    <div class="">You have {{count($categories)}} Categories</div>
    <div class="">You have {{count($products)}} Products</div>
@endsection