@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Thanks')
@section('body_class', 'body-thanks')  


@section('content')

<section class="thanks">
    <div class="thanks__logo">
        <h2>Thank you</h2>
    </div>
    <div class="thanks__text">
        お問い合わせありがとうございました
    </div>
    <div class="thanks__button">
        <a class="thanks__button-return" href="/">
            HOME
        </a>
    </div>
</section>
@endsection