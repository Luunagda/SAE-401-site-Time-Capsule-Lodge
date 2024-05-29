import { Injectable, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SharedService {
  monTableau: any[] = []; // Vous pouvez initialiser ce tableau avec les données nécessaires
  prixMax: number = 700000;

  constructor(private httpClient: HttpClient) {}

  afficheArticle(id: any) {
    if (id > 0) {
      this.httpClient
        .get<any>('http://mvcangular/api/article/' + id)
        .subscribe(
          (data) => {
            console.log(data.donnee);
            // Traitez les données ici
          },
          (error) => {
            console.log('Erreur dans la récupération des données :' + error);
          }
        );
    } else {
      this.httpClient
        .get<any>('http://mvcangular/api/article')
        .subscribe(
          (data) => {
            console.log(data.donnee);
            // Traitez les données ici
          },
          (error) => {
            console.log('Erreur dans la récupération des données :' + error);
          }
        );
    }
  }
}
