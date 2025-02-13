@extends('layouts.admin')
@section('title', 'Dashboard | DPMPTSP Kota Padang')
@section('content')
    <div class="container px-6 mx-auto grid">        
        <x-summary-stats />
        <x-graph />
    </div>
@endsection