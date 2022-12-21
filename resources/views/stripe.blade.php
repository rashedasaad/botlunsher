<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ URL::asset('scss/stripeDev/index.css') }}" />
    </head>
    <body>
        <section>
            <form action="{{ route("subscribe") }}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="product_name" value="{{ $name }}">
                <input type="hidden" name="plan" value="{{ $plan }}">
                <div class="cardFather">
                    <div class="card">
                        <div class="firstSide">
                            <div class="imgs">
                                <img class="visa" src="https://sa.visamiddleeast.com/dam/VCOM/regional/ve/romania/blogs/hero-image/visa-logo-800x450.jpg" alt="card Type">
                                <img class="chip" src="https://png.pngtree.com/png-vector/20190716/ourmid/pngtree-microchip-icon-png-image_1545438.jpg" alt="chip">
                            </div>
                            <div class="cardNumber">
                            </div>
                            <div class="cardRest">
                                <div class="cardHolder">
                                    <p>Card Name</p>
                                    <p id="holderName" class="value"></p>
                                </div>
                                <div class="cardEx">
                                    <p>Expires</p>
                                    <p class="value expire">
                                        <span id="munthEX"></span>
                                        <span>/</span>
                                        <span id="yearEX"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="sucstSide">
                            <span class="line"></span>
                            <div class="cvc">
                                <p class="cvcNuber"></p>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inputs">
                    <label for="">Card Number</label>
                    <input type="text" id="cord_number"/>
                </div>
                <div class="inputs">
                    <label for="">Card Holders</label>
                    <input type="text" id="cardHolderInput" />
                </div>

                <div class="txt">
                    <p>Expiration Date</p>
                    <p style="position: absolute; right: max(3.5vw, 3.5em)">
                        CVV
                    </p>
                </div>
                <div class="sl">
                    <input type="text" id="cardMonth" placeholder="Month" data-ref="cardDate" maxlength="2" class="num">
                    <input  type="text" id="cardYear" placeholder="Year" data-ref="cardDate" maxlength="2" class="num">

                    <input
                        style="display: inline"
                        type="text"
                        id="cardCvv

                        maxlength="4"
                        autocomplete="off"
                        class="num"
                    />
                </div>
                <button class="card-form__button">Submit</button>
            </form>
        </section>
        <script src="{{ URL::asset('js_cardinputs/card_inputs.js') }}"></script>
    </body>
</html> -->




<!-- coco -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('scss/stripeDev/index.css') }}">
    <title>{{env("APP_NAME")}}</title>
</head>
<body>

    <form action="{{ route("subscribe") }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="product_name" value="{{ $name }}">
        <input type="hidden" name="plan" value="{{ $plan }}">

        <div class="form-row">
          <label for="card-element">
            Credit or debit card
          </label>
          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>

          <!-- Used to display Element errors. -->
          <div id="card-errors" role="alert"></div>
        </div>

        <button>Submit Payment</button>
      </form>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ URL::asset('js_cardinputs/card_inputs.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  var stripe = Stripe('pk_test_51LlZTjA6Yt9UrjeplqfzDTtgREpP785YAYNpUsyRUAR935gjAMNYNcyDVL5Y19FGuTEUMklqTs1zrdePKKDbti9D00q22EGTY2');
var elements = stripe.elements();

var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
var card = elements.create('card', {
  style: style,
  hidePostalCode: false
});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });

});
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
})

</script>
</body>
</html>