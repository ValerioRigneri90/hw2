function aggiungiAlCarrello(prodotto_id, quantita = 1) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const cartActionUrl = document.querySelector('meta[name="cart-action-url"]').getAttribute('content');

    fetch(cartActionUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            azione: 'aggiungi',
            prodotto_id: prodotto_id,
            quantita: quantita
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Prodotto aggiunto al carrello!');
            location.reload();
        }
    });
}

