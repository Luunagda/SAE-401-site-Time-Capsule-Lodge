import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-detail-chambre',
  templateUrl: './detail-chambre.component.html',
  styleUrls: ['./detail-chambre.component.scss']
})
export class DetailChambreComponent {

  chambredetail:any;
  image_chambre:any;
  contenu:any;
  alt:any;
  prix:any;
  contenu_chambre:any;
  id:any;

  constructor(private _activatedRoute: ActivatedRoute, private httpClient: HttpClient) { }

  ngOnInit(): void {
    this._activatedRoute.params.subscribe((params: { [slug: string]: any; }) => {
      if (params['slug']) {
        //méthode get
        this.httpClient
      .get<any>('http://mvcangular/api/lire/'+params['slug'])
      .subscribe( //HttpClient retourne un observable
        (reponse) =>{
          console.log(reponse);
          this.chambredetail = reponse;
          console.log(this.chambredetail);
          this.image_chambre = this.chambredetail.image_chambre;
          console.log(this.image_chambre);
          this.contenu = this.chambredetail.contenu;
          this.alt = this.chambredetail.alt;
          this.prix = this.chambredetail.prix;
          this.contenu_chambre = this.chambredetail.contenu_chambre;
          this.id = this.chambredetail.id;
        },
        (error) =>{
          console.log('Erreur dans la récupération des données :'+ error);
        }
      )
      }
    });

    
  }
  ngAfterViewInit() {
    // Chargez le fichier JavaScript externe
    let script = document.createElement('script');
    script.src = 'assets/js/catalogue.js';
    document.body.appendChild(script);
  }
}
