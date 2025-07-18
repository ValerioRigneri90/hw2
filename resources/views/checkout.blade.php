{{-- filepath: c:\Users\valer\hw2\resources\views\checkout.blade.php --}}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $is_success ? 'Pagamento Completato' : 'Checkout - Dreame' }}</title>
    <link rel="stylesheet" href="{{ asset('css/carrello.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>
<body>
    @if($is_success)
        <!-- Pagina di successo -->
        <div class="success-container">
            <div class="success-icon">✅</div>
            <h1>Pagamento Completato!</h1>
            <p>Grazie per il tuo acquisto!</p>

            @if(isset($order_id) && $order_id)
                <div class="order-info">
                    <p><strong>ID Transazione:</strong> {{ $order_id }}</p>
                    <p><strong>Importo:</strong> €{{ number_format($totale, 2, ',', '.') }}</p>
                </div>
            @endif

            <div class="btn-container">
                <a href="{{ route('products', ['categoria' => 'all']) }}" class="btn">Continua lo Shopping</a>
            </div>
        </div>
    @else
        <!-- Pagina di checkout -->
        <div class="checkout-container">
            <a href="{{ route('cart.show') }}" class="back-link">← Torna al Carrello</a>

            <h1>Checkout</h1>

            @if(count($carrello_items) > 0)
                <div class="order-summary">
                    <h2>Riepilogo Ordine</h2>
                    @foreach($carrello_items as $item)
                        <div class="order-item">
                            <span>{{ $item['name'] }} (x{{ $item['quantita'] }})</span>
                            <span>€{{ number_format($item['price'] * $item['quantita'], 2, ',', '.') }}</span>
                        </div>
                    @endforeach

                    <div class="order-total">
                        Totale: €{{ number_format($totale, 2, ',', '.') }}
                    </div>
                </div>

                <div id="paypal-button-container"></div>

            @else
                <p>Il carrello è vuoto. <a href="{{ route('products', ['categoria' => 'all']) }}">Vai ai prodotti</a></p>
            @endif
        </div>

        <script src="https://www.paypal.com/sdk/js?client-id=ATUBi1cJcXnEuNgnI_CvOlbZjCNc1PeeQgBVueM-tcahnN1ZesmfscOghnWliTcXzFI5jyBBGRgf8OnS&currency=EUR&disable-funding=card,credit,paylater,venmo,bancontact,sofort,eps,giropay,ideal,mybank"></script>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ $totale }}'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        window.location.href = '{{ route("checkout.success") }}?orderID=' + data.orderID;
                    });
                },
                onError: function(err) {
                    alert('Errore nel pagamento');
                }
            }).render('#paypal-button-container');
        </script>
    @endif
</body>
</html>
