import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-panier',
  templateUrl: './panier.component.html',
  styleUrls: ['./panier.component.scss']
})
export class PanierComponent {
  userId: number;
  localstorage: any;
 
  constructor(private route: ActivatedRoute, private router: Router, private httpClient: HttpClient) {
      this.userId = Number(localStorage.getItem('userId'));
    if (!this.userId || isNaN(this.userId)) {
      this.router.navigate(['/connexion']);
    }

//Essaie de récupérer le panier dans le localstorage
//le panier est récupérer mais je n'arrive pas à récupérer uniquement les produits

    //this.localstorage = localStorage.getItem('panier');
  
    //console.log(this.localstorage);
    }

//utilisateur_id = localsotrage.getItem('userId');
   


    addCommande() {
   /*   

  // Envoyez les informations de connexion au serveur en utilisant une requête POST
  //cela va servire pour stockée les commande dans la base de donnée


      this.httpClient.post('http://mvcangular/api/connexion', { utilisateur_id }).subscribe(
      (response: any) => {
        console.log(response);
        this.router.navigate(['/']);
      },
      (error) => {
        console.error(error);
      }
    );
    */
    }
  ngAfterViewInit() {
    // Chargez le fichier JavaScript externe
    let script = document.createElement('script');
    script.src = 'assets/js/catalogue.js';
    document.body.appendChild(script);

    script = document.createElement('script');
    script.src = 'assets/js/panier.js';
    document.body.appendChild(script);
  }
  
}
