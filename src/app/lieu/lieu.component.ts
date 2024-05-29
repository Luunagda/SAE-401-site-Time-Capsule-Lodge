import { Component } from '@angular/core';

import { HttpClient} from '@angular/common/http';

@Component({
  selector: 'app-lieu',
  templateUrl: './lieu.component.html',
  styleUrls: ['./lieu.component.scss']
})
export class LieuComponent {
  constructor(private httpClient: HttpClient){}

  monTableau:any[]=[];

  ngOnInit(){
    this.httpClient
      .get<any>('http://mvcangular/api/article')
      .subscribe( //HttpClient retourne un observable
        (reponse) =>{
          console.log("reponse");
          this.monTableau = reponse.donnee.sort((a: { annee: number; }, b: { annee: number; }) => a.annee - b.annee);
          console.log(this.monTableau);
        },
        (error) =>{
          console.log('Erreur dans la récupération des données :'+ error);
        }
      )
  }
  ngAfterViewInit() {
    // Chargez le fichier JavaScript externe
    // ça ne fonctionne pas malheureusement
    let script = document.createElement('script');
    script.src = 'assets/js/catalogue.js';
    document.body.appendChild(script);
  }
}
