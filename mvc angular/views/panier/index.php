<main>
        <h1>Panier</h1>
        <div>
            <table class="table produit" id="panier" style="width: 70%; align-items: flex-start;">
                <thead>
                    <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">Prix U.</th>
                        <th scope="col">Date</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
            <script>
                if (data===null){
                    const titre = document.createElement('h1');
                    titre.classList.add('titre');
                    titre.innerHTML = `<h1>Oops ! Votre panier est vide.</h1>`;
                    document.body.appendChild(titre);
                }
            </script>
            <table class="table total" id="panier" style="width: 25%; position: sticky; top: 2%;" >
                
                    <tr>
                        <td colspan="2"></td>
                        <th scope="row" class="text-end">Total Panier TTC</th>
                        <td id="PrixTotal"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th scope="row" class="text-end">Montant TVA</th>
                        <td id="montantTva"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th scope="row" class="text-end">Frais livraison</th>
                        <td id="fraislivraison"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th scope="row" class="text-end">Réduction</th>
                        <td id="reduction"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th scope="row" class="text-end">Total à payer</th>
                        <td id="TotalPayer"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td scope="row" class="text-end">
                            <a href="catalogue.html" class="btn btn-info">Retournez au catalogue</a>
                        </td>
                        <td><a href="/formulaire" class="btn btn-info">Valider la commande</a></td>
                        <td><a href="#" class="btn btn-danger" id="btn_suppr_tout">Supprimer le panier</a></td>
                    </tr>
                
            <!--</table>
            <table class="">
            -->
            </table>
            
        </div>       
    </main>      