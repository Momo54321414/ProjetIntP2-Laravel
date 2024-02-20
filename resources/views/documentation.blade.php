@extends('_layout.app') @section('title','Documentation') @section('content')

<div id="banner">
    <input id="search" type="text" placeholder="Search">
    <div id="grid">
        <div id="items">
            <a href="#test">Home</a>
            <a>Configuration</a>
            <a>Item</a>
            <a>item</a>
        </div>
        <div>
            <div id="title"> {{__('Dashboard_Banner_Head')}} </div>
            <div id="desc"> {{__('Dashboard_Banner_Head')}} </div>
        </div>
    </div>
</div>

@endsection