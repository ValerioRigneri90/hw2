{{-- filepath: c:\Users\valer\hw2\resources\views\cart.blade.php --}}
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello - Dreame</title>
    <link rel="stylesheet" href="{{ asset('css/carrello.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="carrello-container">
        <h1>Il tuo Carrello</h1>

        @if(isset($carrello_items) && count($carrello_items) > 0)
            <div class="carrello-items">
                @foreach($carrello_items as $item)
                    <div class="carrello-item">
                        <img src="{{ asset('immagini/prodotti/prodottiCategoria/' . $item['category'] . '/' . $item['image']) }}"
                             alt="{{ $item['name'] }}">

                        <div class="item-details">
                            <h3>{{ $item['name'] }}</h3>
                            <p class="prezzo">€{{ number_format($item['price'], 2, ',', '.') }}</p>
                        </div>

                        <div class="quantita-controls">
                            <form method="POST" action="{{ route('cart.action') }}" style="display: inline;">
                                @csrf
                                <input type="hidden" name="azione" value="aggiorna">
                                <input type="hidden" name="carrello_id" value="{{ $item['id'] }}">
                                <input type="hidden" name="quantita" value="{{ $item['quantita'] - 1 }}">
                                <button type="submit" {{ $item['quantita'] <= 1 ? 'disabled' : '' }}>−</button>
                            </form>

                            <span>{{ $item['quantita'] }}</span>

                            <form method="POST" action="{{ route('cart.action') }}" style="display: inline;">
                                @csrf
                                <input type="hidden" name="azione" value="aggiorna">
                                <input type="hidden" name="carrello_id" value="{{ $item['id'] }}">
                                <input type="hidden" name="quantita" value="{{ $item['quantita'] + 1 }}">
                                <button type="submit" {{ $item['quantita'] >= 10 ? 'disabled' : '' }}>+</button>
                            </form>
                        </div>

                        <div class="item-total">
                            €{{ number_format($item['price'] * $item['quantita'], 2, ',', '.') }}
                        </div>

                        <form method="POST" action="{{ route('cart.action') }}" style="display: inline;">
                            @csrf
                            <input type="hidden" name="azione" value="rimuovi">
                            <input type="hidden" name="carrello_id" value="{{ $item['id'] }}">
                            <button type="submit" class="rimuovi-btn">Rimuovi</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="carrello-totale">
                <h2>Totale: €{{ number_format($totale, 2, ',', '.') }}</h2>
                <a href="{{ route('checkout.show') }}" class="checkout-btn">Procedi al Checkout</a>
            </div>
        @else
            <div class="empty-cart-container">
                <p>Il tuo carrello è vuoto.</p>
                <a href="{{ route('products', ['categoria' => 'all']) }}" class="continua-shopping">Continua lo Shopping</a>
            </div>
        @endif
    </div>
</body>
</html>
