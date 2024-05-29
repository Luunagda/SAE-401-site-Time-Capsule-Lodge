totalProduit = () => {
    nbProduits = 0;
    panier.products.forEach(product => {
        nbProduits += 1;
        console.log(nbProduits)
    })
    document.getElementById('nb').innerText = nbProduits;
}

formatPrice = (price) => {
    return price.toFixed(2).replace('.',',') + ' XPF';
}

console.log('Bouton moins');
panier= {};
console.log(document);

console.log("DOM chargé");
if (localStorage.getItem('panier') === null){
    panier = { products: [] };
    console.log(panier);
} else {
    panier =  JSON.parse(localStorage.getItem('panier'));
    console.log(panier);
    totalProduit();
}



//Il n'arrive pas à accéder au document.querySelector('.add-to-card')
//pour une raison inconnue. Il ne trouve pas le bouton. 
//Quand il le veut il le trouve et à la seconde suivante ça ne marche plus. Je ne comprends pas.

console.log(document.querySelectorAll('.add-to-card'));
const btns = document.querySelectorAll('.add-to-card');
console.log(btns);
btns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        console.log('click btn');
        document.getElementById('nb').innerText = parseInt(document.getElementById('nb').innerText) + 1;
        let clickId;
        if (e.target.localName === "svg") {
            clickId = e.target.parentElement.dataset.id;
            obj = e.target.parentElement;
        }
        else{
            clickId = e.target.dataset.id
            obj = e.target;
        }
        const product = panier.products.find(product => product.id === clickId);
        
        /* ou product = panier.products.forEach(product =>{
            if(product.id === e.target.dataset.id) {
                return product
            }
        })*/
        
        const input_aller = obj.parentElement.parentElement.children[3].querySelector('input');
        const input_retour = obj.parentElement.parentElement.children[4].querySelector('input');
        
        if(product !== undefined){
            alert("Vous avez déjà mis cette chambre dans votre panier.");
        } else {
            console.log(input_aller.value)
            const product = {
                id: clickId,
                name: obj.parentElement.parentElement.querySelector('.card-title').innerText,
                price: parseFloat(obj.parentElement.parentElement.querySelector('.price').innerText),
                date_aller: input_aller.value,
                date_retour: input_retour.value,
                image: obj.parentElement.parentElement.parentElement.querySelector('img').src
            }
            panier.products.push(product);
            
            console.log("!!");
            console.log(panier)
            let totalPanier = 0;
            panier.products.forEach(product => {
                totalPanier += 1;
            })
            
            totalProduit();
            localStorage.setItem('panier', JSON.stringify(panier));
        }
    })
});

