@extends('layouts.app')

@section('content')
<div class="page-section">
    <div class="container">
    @isset($datos)
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2>Completa los campos para procesar tu pago</h2>
                    <br>
                </div>
            </div>
        </div>
 
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
 
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
    
            </div>
            <div class="col-lg-6">
                {{-- <form  action="{{ route('processPayment') }}"  data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" name="frmStripe" id="frmstripe" method="post">
                    @csrf
                    <input type="hidden" name="pais" value="{{$datos['pais']}}">
                    <input type="hidden" name="estado" value="{{$datos['estado']}}">
                    <input type="hidden" name="direccion" value="{{$datos['direccion']}}">
                    <input type="hidden" name="cp" value="{{$datos['cp']}}">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label>Nombre del titular</label>
                            <input class="form-control" type="text" name="cardholder" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label>Número de la tarjeta</label>
                            <input autocomplete="off" class="form-control solonumeros" size="16" minlength="16" maxlength="16" type="text" name="card_no" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label>CVC</label>
                            <input autocomplete="off" class="form-control solonumeros" placeholder="ex. 311" size="3" type="text" name="cvv" maxlength="3" required>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Mes</label>
                            <input class="form-control solonumeros" placeholder="MM" size="2" minlength="2" maxlength="2" type="number" min="1" max="12" name="expiry_month">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Año</label>
                            <input class="form-control solonumeros" placeholder="YY" size="2" minlength="2" maxlength="2" type="number" min="21" name="expiry_year" minlength="2" maxlength="2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-control total btn btn-danger">
                                Total: <span class="amount font-weight-bold"><input type="hidden" name="total" id="total" value=" {{ Cart::getTotal() }}">${{ Cart::getTotal() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <button class="form-control btn btn-success submit-button" type="submit" style="margin-top: 10px;">Pagar »</button>
                        </div>
                    </div>
                </form>--}}
                <form action="{{ route('paymentIntent') }}" id="payment-form" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <label for="name">
                        Name
                        </label>
                        <input id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <label for="email">
                        Email
                        </label>
                        <input id="email" name="email" required>
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="error-message" role="alert"></div>

                    <button id="submit-button">Pay with OXXO</button>
                </form>
            </div>
        </div>
    @endisset
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51J7nfCJlKfVI7APftrIVIc4PbYfqGQkfzYePskvyBUgIzJfobHAU0no6eq2AsGZQccYO2nd5WwaG8HtQR4JPALjN007P6Sk6gD');
    var myHeaders = new Headers();
    myHeaders.append("x-csrf-token", "{{ csrf_token() }}");
    var requestOptions = {
        method: 'POST',
        headers: myHeaders
    };
    var response = fetch("{{ route('paymentIntent') }}", requestOptions)
        .then(function(response) {
        return response.json();
    }).then(function(responseJson) {
        var clientSecret = responseJson["intent"].client_secret;
        // Call stripe.confirmOxxoPayment() with the client secret.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.confirmOxxoPayment(
                clientSecret,
                {
                payment_method: {
                    billing_details: {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    },
                },
                }) // Stripe.js will open a modal to display the OXXO voucher to your customer
                .then(function(result) {
                // This promise resolves when the customer closes the modal
                if (result.error) {
                    // Display error to your customer
                    var errorMsg = document.getElementById('error-message');
                    errorMsg.innerText = result.error.message;
                }
            });
        });
    });
    
</script>
@endsection