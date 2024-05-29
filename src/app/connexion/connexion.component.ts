import { Component } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.component.html',
  styleUrls: ['./connexion.component.scss']
})
export class ConnexionComponent {
  login = new FormGroup({
    username: new FormControl(''),
    password: new FormControl(''),
  });
  errorMessage: string = '';

  constructor(private httpClient: HttpClient, private router: Router) {}

  onSubmit() {
    this.errorMessage = ''; // Réinitialisez le message d'erreur

    const username = this.login.value.username;
    const password = this.login.value.password;

    // Envoyez les informations de connexion au serveur en utilisant une requête POST
    this.httpClient.post('http://mvcangular/api/connexion', { username, password }).subscribe(
      (response: any) => {
        console.log(response.authenticated);
        if (response.authenticated) {
          // L'utilisateur est authentifié avec succès
          console.log('Vous êtes connecté !');
          localStorage.setItem('userId', response.userId);
          // Redirigez l'utilisateur vers une page appropriée
          this.router.navigate(['/client']);
        } else {
          // L'authentification a échoué
          this.errorMessage = 'Vos identifiants sont incorrects !';
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }
}





  /*onSubmit() {
    this.errorMessage = ''; // Réinitialisez le message d'erreur
  
    this.httpClient.get('http://mvcangular/api/utilisateur').subscribe(
      (response: any) => {
        this.connexionTab = response.donnee;
        let isUserFound = false; // Utilisé pour vérifier si l'utilisateur a été trouvé
        
        response.donnee.forEach((element: { id: string ; login: string | null | undefined; password: string | null | undefined; }) => {
          if (element.login === this.login.value.username && element.password === this.login.value.password) {
            console.log('Vous êtes connecté !');
            localStorage.setItem('userId', element.id);
            isUserFound = true; // L'utilisateur a été trouvé
          }
        });
  
        if (!isUserFound) {
          this.errorMessage = 'Vos identifiants sont incorrects !'; // Définissez le message d'erreur
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }*/