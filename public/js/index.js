function showTestimonials(event)
{

    const testimonialH2=document.querySelector(".testimonial-container h2");
    const testimonialWrapper=document.querySelector(".testimonial-wrapper");
    const button=event.target;
    const h2Display=window.getComputedStyle(testimonialH2).display;
    const wrapperDisplay=window.getComputedStyle(testimonialWrapper).display;

    if(wrapperDisplay=="flex" &&h2Display=="block")
    {
        testimonialH2.style.display="none";
        testimonialWrapper.style.display="none";
        button.textContent="Leggi di più";
        clearInterval(button.timer);
        button.timer = null;
    }
    else
    {
        button.textContent="Leggi di meno";
        testimonialH2.style.display="block";
        testimonialWrapper.style.display="flex";
        fakeTestimonials();
        button.timer=setInterval(fakeTestimonials,7000);
    }
}

const button=document.querySelector("#testimonial-button");
button.addEventListener("click",showTestimonials);




function createBackgroundChanger() {
    const bgButton = document.createElement('button');
    bgButton.classList.add('bg-change-button');
    bgButton.setAttribute('data-current-bg', '1');

    bgButton.addEventListener('click', function() {
        const header = document.querySelector('header');
        const headerContent = header.querySelector('div');

        const currentBg = bgButton.getAttribute('data-current-bg');

        if (currentBg === '1') {
            header.style.backgroundImage = 'none';

            const videoBackground = document.createElement('video');
            videoBackground.classList.add('video-background');

            videoBackground.src = '../video/secondo_video.mp4';
            videoBackground.autoplay = true;
            videoBackground.loop = true;
            videoBackground.muted = true;
            videoBackground.playsInline = true;

            header.insertBefore(videoBackground, header.firstChild);

            headerContent.innerHTML = `
                <div class="dreame-content">
                    <h2 class="dreame-title">Dreame X50 Ultra Complete</h2>
                    <p class="dreame-description">Rise Up, Clean Beneath</p>
                    <a href="${window.productUrl3}"><button class="dreame-button">Per saperne di più</button></a>
                </div>
            `;

            bgButton.setAttribute('data-current-bg', '2');
        } else
        {
            const videoBackground = header.querySelector('.video-background');
            if (videoBackground) {
                header.removeChild(videoBackground);
            }

            header.style.backgroundImage = "url('../immagini/header.png')";

            headerContent.innerHTML = `
            <span>Novità</span>
            <h1>Dreame H15 Pro Heat</h1>
            <h3>Lava con il calore, pulisci con l'IA</h3>
            <a href="${window.productUrl12}"><button>Compra Ora</button></a>
            `;

            bgButton.setAttribute('data-current-bg', '1');
        }

        bgButton.classList.toggle('active');
    });

    return bgButton;
}

document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector(".testimonial-container button");
    button.addEventListener("click", showTestimonials);

    const bgButton = createBackgroundChanger();
    const header = document.querySelector('header');
    header.appendChild(bgButton);
});




const testimonials = [];

const frasi = [
    "Il robot aspirapolvere pulisce mentre ti rilassi.",
    "Programma il tuo robot per una casa sempre pulita.",
    "Dì addio alla polvere con un clic.",
    "Pulizia automatica, senza sforzo.",
    "Il miglior amico delle case moderne.",
    "Perfetto per chi ha poco tempo.",
    "Rimuove peli di animali in un attimo.",
    "Silenzioso ma potente.",
    "Rileva e aggira gli ostacoli.",
    "Pulisce anche sotto i mobili.",
    "Il futuro della pulizia è già qui.",
    "Aspirazione intelligente su ogni superficie.",
    "Programmazione giornaliera facile e veloce.",
    "Controllabile da smartphone.",
    "Compatibile con Alexa e Google Home.",
    "La tecnologia al servizio della tua casa.",
    "Mantiene i pavimenti brillanti ogni giorno.",
    "Ideale per chi soffre di allergie.",
    "Sistema di filtraggio HEPA incluso.",
    "Mappatura intelligente degli ambienti.",
    "Riconosce tappeti e li pulisce a fondo.",
    "Dotato di sensori anticaduta.",
    "Si ricarica da solo alla base.",
    "Modalità silenziosa per le ore notturne.",
    "Risparmia tempo prezioso ogni settimana.",
    "Nessun angolo resta sporco.",
    "La soluzione perfetta per famiglie con bambini.",
    "Funziona anche mentre non sei a casa.",
    "Fai brillare il parquet senza rovinarlo.",
    "Un alleato contro la polvere invisibile.",
    "Evita fili e piccoli oggetti sul pavimento.",
    "Pulizia efficace in ambienti grandi e piccoli.",
    "Si adatta automaticamente all'altezza del tappeto.",
    "Tecnologia laser per una pulizia precisa.",
    "Ritorna alla base quando la batteria è bassa.",
    "Facile da svuotare e pulire.",
    "Un passo avanti nella domotica domestica.",
    "Rendi la tua casa smart anche nella pulizia.",
    "Batteria a lunga durata per grandi superfici.",
    "Elimina sporco, briciole e capelli con facilità.",
    "Protegge i mobili grazie ai sensori di distanza.",
    "Filtro lavabile per una manutenzione semplice.",
    "Riconosce automaticamente le stanze.",
    "Crea zone vietate tramite l'app.",
    "Aspirazione potente con basso consumo.",
    "Perfetto per case con animali domestici.",
    "Semplifica la tua routine di pulizia.",
    "Lavora in autonomia totale.",
    "Design sottile per entrare ovunque.",
    "Sistema anti-groviglio per capelli.",
    "Ruote ammortizzate per superfici delicate.",
    "Aggiornamenti software per nuove funzioni.",
    "Funzione mop per lavare i pavimenti.",
    "Rilevamento automatico del tipo di superficie.",
    "Modalità turbo per lo sporco ostinato.",
    "Non lascia residui né polvere.",
    "Compatto ma estremamente efficiente.",
    "Si sincronizza con il tuo calendario.",
    "Riconosce le aree ad alto traffico.",
    "Lavora anche su moquette spessa.",
    "Gestione intelligente della batteria.",
    "Pulisce bordi e angoli con spazzole laterali.",
    "Personalizza gli orari di pulizia.",
    "Monitoraggio in tempo reale dall'app.",
    "Facile da configurare e usare.",
    "Mantiene la casa fresca e pulita.",
    "Un robot aspirapolvere per ogni esigenza.",
    "Affidabile e durevole nel tempo.",
    "Zero fatica per pavimenti splendenti.",
    "Lavoro silenzioso per il massimo comfort.",
    "Evita tappeti delicati automaticamente.",
    "Modalità eco per risparmio energetico.",
    "Si muove agilmente in spazi stretti.",
    "Pulisce mentre tu sei al lavoro.",
    "Riduce al minimo gli allergeni domestici.",
    "Facilita la vita quotidiana.",
    "Si integra nella tua smart home.",
    "Tecnologia di navigazione avanzata.",
    "Aggira con cura i mobili fragili.",
    "Ideale anche per piccoli appartamenti.",
    "Sistema di pulizia a più fasi.",
    "Scarica automaticamente lo sporco nella base.",
    "Non lascia strisce sui pavimenti lucidi.",
    "Facile da trasportare e riporre.",
    "Controllo vocale immediato.",
    "Mantiene pulito anche sotto il letto.",
    "Sistema di evitamento ostacoli 3D.",
    "Batteria rapida da ricaricare.",
    "Sempre pronto per una nuova sessione.",
    "Elegante e moderno nel design.",
    "Pulisce anche le fughe delle piastrelle.",
    "Rispetta gli spazi senza danneggiarli.",
    "Dimentica la scopa e goditi il relax.",
    "Semplifica le pulizie settimanali.",
    "Tecnologia multisensore per una pulizia completa.",
    "Non teme peli e polvere nascosta.",
    "Un robot aspirapolvere migliora la qualità della vita."
];

function onResponse(response) {
    return response.json();
}

function onJson(json) {
    const testimonialWrapper = document.querySelector(".testimonial-wrapper");
    testimonialWrapper.innerHTML = "";

if(json.error)
{
    testimonialWrapper.innerHTML="<div class='error-message'>Errore nel caricamento dei dati: " + json.error + "</div>";
    return;
}

if(!json.results || json.results.length === 0)
    {
    testimonialWrapper.innerHTML="<div class='error-message'>Nessun dato disponibile.</div>";
    return;
}


    for (user of json.results) {
        let randomIndex = Math.floor(Math.random() * frasi.length);
        let fraseScelta = frasi.splice(randomIndex, 1)[0];
        let testimonial = {
            name: user.name.first + " " + user.name.last,
            image: user.picture.large,
            frase: fraseScelta
        };
        testimonials.push(testimonial);
    }
    for (let i of testimonials) {
        const newDiv = document.createElement("div");
        newDiv.classList.add("testimonial-card");
        newDiv.innerHTML = ' <img src="' + i.image + '" alt="Testimonial">' +
            '<h3>' + i.name + '</h3>' +
            '<p>' + i.frase + '</p>' +
            '<div class="stars">★★★★½</div>';
        testimonialWrapper.appendChild(newDiv);
    }
}

function fakeTestimonials() {
    testimonials.length = 0;

    fetch("/api/testimonials")
        .then(onResponse)
        .then(onJson);
}







const subMenButton=document.querySelector(".toggle-btn");
subMenButton.addEventListener("click",showSectionSubmenu);

function showSectionSubmenu(event) {
    event.preventDefault();
    const subMenu=document.querySelector(".submenu");
    const subMenuDisplay=window.getComputedStyle(subMenu).display;

    if(subMenuDisplay=="none")
    {
        subMenu.style.display="block";
        subMenButton.textContent="-";
    }
    else
    {
        subMenu.style.display="none";
        subMenButton.textContent="+";
    }
}

function ricercaElemento(event)
{
    const inputRicerca=formRicerca.search.value;


    if(inputRicerca.trim().length===0)
    {
        alert("Il campo di ricerca non può essere vuoto");
        event.preventDefault(); // blocco l'invio del form
        return;
    }


}



const formRicerca=document.forms["ricerca-form"];

formRicerca.addEventListener("submit",ricercaElemento);




const temp=document.querySelector(".cart-link");

temp.addEventListener("click",bloccaCarrello);


function bloccaCarrello(event)
{

   if(!window.flag)
   {
    event.preventDefault();
    alert("Devi essere loggato per accedere al carrello");

    window.location.href=window.loginUrl;
    return;
   }




}



function onJsonNewsletter(json)
{

    if(!json.flag && json.error==="non_loggato")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        window.location.href=window.loginUrl;
        return;
    }

    if(!json.flag && json.error==="iscritto")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        return;
    }


    if(json.flag && json.success=="iscrizione_corretta")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        return;
    }

    if(!json.flag && json.error==="email_non_valida")
    {
        alert(json.message);
        const temp = document.querySelector("#footer-input");
        temp.value = ""; // pulisco il campo di input
        return;
    }
}



// prendiamo la risposta del server e laconvertiamo in oggetto javascript
function onResponseNewsletter(response) {
    return response.json();
}



const butttonFooter=document.querySelector("#footer-button");
butttonFooter.addEventListener("click",bloccaButtonFooter);


function bloccaButtonFooter(event) {
    event.preventDefault();

    const temp = document.querySelector("#footer-input");
    const value = temp.value.trim();

    if(value.length == 0)
        {
        alert("Il campo non può essere vuoto");
        return;
    }
    else
    {

            fetch("/newsletter/subscribe",{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ // convertiamo l'oggetto in una stringa JSON
                    email: value
                })
            }).then(onResponseNewsletter)
            .then(onJsonNewsletter);
    }
}
