<?php
require 'vendor/autoload.php'; // Assure-toi d'installer Stripe via Composer

\Stripe\Stripe::setApiKey('sk_test_your_secret_key'); // Remplace par ta clé secrète Stripe

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['stripeToken'];
    $amount = 5000; // Montant en centimes (ex: 50.00€)

    try {
        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'eur',
            'description' => 'Achat sur ma boutique en ligne',
            'source' => $token,
        ]);

        echo "Paiement réussi!";
    } catch (\Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <header>
        <h1>Paiement</h1>
    </header>
    <main>
        <form action="" method="post" id="payment-form">
            <div id="card-element"></div>
            <button type="submit">Payer</button>
        </form>
        <script>
            var stripe = Stripe('pk_test_your_public_key'); // Remplace par ta clé publique Stripe
            var elements = stripe.elements();
            var card = elements.create('card');
            card.mount('#card-element');

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        console.error(result.error.message);
                    } else {
                        var form = document.getElementById('payment-form');
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);
                        form.appendChild(hiddenInput);
                        form.submit();
                    }
                });
            });
        </script>
    </main>
</body>
</html>
