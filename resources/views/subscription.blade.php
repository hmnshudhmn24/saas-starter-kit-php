<!DOCTYPE html>
<html>
<head>
    <title>Subscription</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Select a Plan</h2>
    <form id="payment-form" method="POST" action="{{ route('subscribe') }}">
        @csrf
        <select name="plan" class="form-select mb-3">
            <option value="price_basic">Basic - $10/month</option>
            <option value="price_pro">Pro - $30/month</option>
        </select>
        <input type="text" name="card-holder-name" class="form-control mb-3" placeholder="Cardholder name">
        <div id="card-element" class="mb-3"></div>
        <input type="hidden" name="paymentMethod" id="paymentMethod">
        <button id="submit-button" class="btn btn-primary">Subscribe</button>
    </form>
</div>
<script>
    const stripe = Stripe('{{ config('cashier.key') }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const { paymentMethod, error } = await stripe.createPaymentMethod('card', card, {
            billing_details: { name: document.querySelector('[name="card-holder-name"]').value }
        });

        if (error) {
            alert(error.message);
        } else {
            document.getElementById('paymentMethod').value = paymentMethod.id;
            form.submit();
        }
    });
</script>
</body>
</html>
