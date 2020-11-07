@extends('layouts.map')

@section('top-nav-bar')
    @parent
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" crossorigin="anonymous">
@endsection

@section('content')
    <div class="row p-6">
        <div class="col-12">
            <div class="page-title">
                <h1>{!! __('messages.google-places') !!}</h1>
                <p>
                    {!! __('messages.enter-an-address') !!}
                </p>
            </div>
            <div class="pac-card" id="pac-card">
                <div id="pac-container">
                    <form id="address">
                        <div class="form-group">
                            <label for="address">{!! __('messages.address') !!}</label>
                            <input id="places-input" type="text" placeholder="{!! __('messages.type-an-address') !!}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{!! __('messages.info-about-address-appears-below') !!}</label>
                            <input id="formatted-address" type="text" placeholder="{!! __('messages.formatted-address') !!}" class="form-control" readonly>
                            <input id="postal-code" type="text" placeholder="{!! __('messages.postal-code') !!}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>{!! __('messages.region-city-country') !!}:</label>
                            <input id="region" type="text" placeholder="{!! __('messages.region') !!}" class="form-control" readonly>
                            <input id="city" type="text" placeholder="{!! __('messages.city') !!}" class="form-control" readonly>
                            <input id="country" type="text" placeholder="{!! __('messages.country') !!}" class="form-control" readonly>
                            <input id="country-code" type="text" placeholder="{!! __('messages.country-code') !!}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>{!! __('messages.coordinates') !!}:</label>
                            <input id="latitude" type="text" placeholder="{!! __('messages.latitude') !!}" class="form-control" readonly>
                            <input id="longitude" type="text" placeholder="{!! __('messages.longitude') !!}" class="form-control" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-nav')
    @parent
@endsection

@section('js')
    @parent()

    {{-- LOAD CUSTOM PLACES HANDLER --}}
    <script src="{{ asset('js/places-handler.js') }}"></script>
@endsection
