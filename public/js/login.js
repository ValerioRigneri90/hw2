
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


function checkForm(event)
{

    const inputEmail=document.querySelector("#email");
    const inputPassword=document.querySelector("#password");


    if(inputEmail.value.trim().length===0||inputPassword.value.trim().length==0)
    {
        alert("Tutti i campi sono obbligatori");
        event.preventDefault(); // blocco l'invio del form
        return;
    }


}



const form=document.forms["form-login"];
form.addEventListener("submit",checkForm);



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





// Blocco accesso carrello se non loggato
const cartLink = document.querySelector(".cart-link");

    cartLink.addEventListener("click", bloccaCarrello);


function bloccaCarrello(event) {
    if (!window.flag) {
        event.preventDefault();
        alert("Devi essere loggato per accedere al carrello");
        window.location.href = window.loginUrl;
        return;
    }
}
