// auth.guard.ts
import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { AuthService } from './auth.service'; // Importez le service d'authentification
@Injectable({
  providedIn: 'root',
})
export class AuthGuard implements CanActivate {
  constructor(private authService: AuthService, private router: Router) {}

  canActivate(): boolean {
    if (this.authService.isLoggedIn()) {
      return true; // L'utilisateur est connecté, autorisez l'accès
    } else {
      this.router.navigate(['/connexion']); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
      return false;
    }
  }
}
//  NE SERT A RIEN MAIS NE LE SUPPRIME PAS POUR PAS CASSER LE CODE
