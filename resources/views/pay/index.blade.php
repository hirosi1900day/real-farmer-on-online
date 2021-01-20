@extends('layouts.app')

@section('content')
  
<div class="index-container shadow margin center">
  <div class="title">1000円分ポイントを入れる</div>
  <div class="text">1000円で100ポイント入ります</div>
  <form action="{{ route('user.pay.payment1000') }}" method="POST" class="text-center mt-5">
        {{ csrf_field() }}
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="1000"
            data-name="Stripe Demo"
            data-label="決済をする"
            data-description="これはStripeのデモです。"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</div>

<div class="index-container shadow margin center">
  <div class="title">3000円分ポイントを入れる</div>
  <div class="text">3000円で350ポイント入ります</div>
  <form action="{{ route('user.pay.payment3000') }}" method="POST" class="text-center mt-5">
        {{ csrf_field() }}
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="3000"
            data-name="Stripe Demo"
            data-label="決済をする"
            data-description="これはStripeのデモです。"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</div>

<div class="index-container shadow margin center">
  <div class="title">5000円分ポイントを入れる</div>
  <div class="text">5000円で600ポイント入ります</div>
  <form action="{{ route('user.pay.payment5000') }}" method="POST" class="text-center mt-5">
        {{ csrf_field() }}
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="5000"
            data-name="Stripe Demo"
            data-label="決済をする"
            data-description="これはStripeのデモです。"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</div>
@endsection