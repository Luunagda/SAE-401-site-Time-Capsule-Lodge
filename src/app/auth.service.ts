import { Injectable } from '@angular/core';
import { LocalStorage } from '@ngx-pwa/local-storage';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private localStorage: LocalStorage, private router: Router) {}

  login(userId: string) {
    // Stockez l'identifiant de l'utilisateur dans le local storage
    this.localStorage.setItem('userId', userId).subscribe(() => {
      console.log('Utilisateur connecté : ' + userId);
      this.router.navigate(['/client']); // Redirigez vers la page client après la connexion
    });
  }

  logout() {
    // Supprimez l'identifiant de l'utilisateur du local storage
    localStorage.removeItem('userId')
    console.log('Utilisateur déconnecté');
    this.router.navigate(['/']); // Redirigez vers la page de connexion après la déconnexion

  }

  isLoggedIn(): boolean {
    // Vérifiez si l'utilisateur est connecté en vérifiant la présence de l'identifiant de l'utilisateur dans le local storage
    console.log('Utilisateur connecté : ' + localStorage.getItem('userId'));
    if (localStorage.getItem('userId') == null) {
      return false;
    } else {
      return true;
    }
    //return !!this.localStorage.getItem('userId');
  }
}
