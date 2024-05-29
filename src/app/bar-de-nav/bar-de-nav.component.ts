import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { SharedService } from '../shared.service'; // Importez un service partagé
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-bar-de-nav',
  templateUrl: './bar-de-nav.component.html',
  styleUrls: ['./bar-de-nav.component.scss']
})
export class BarDeNavComponent implements OnInit {
  monTableau: any[] = [];
  isLoggedIn: boolean = false;

  constructor(private httpClient: HttpClient, private authService: AuthService, private sharedservice: SharedService) {}

  ngOnInit() {
    this.isLoggedIn = this.authService.isLoggedIn();
    console.log(this.isLoggedIn);
    this.httpClient
      .get<any>('http://mvcangular/api/categorie')
      .subscribe(
        (data) => {
          //console.log(data.donnee);
          this.monTableau = data.donnee;
          this.monTableau.forEach(element => {
            element.lien = element.nom.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();            
          });
        },
        (error) => {
          console.log('Erreur dans la récupération des données :' + error);
        }
      );
  }

  onClickAfficheArticle(id: any) {
    this.sharedservice.afficheArticle(id); // Utilisez le service partagé pour appeler la fonction
  }

  logout() {
    // Gérez la déconnexion de l'utilisateur en utilisant le service d'authentification
    this.authService.logout();
    this.isLoggedIn = false;
  }
}
