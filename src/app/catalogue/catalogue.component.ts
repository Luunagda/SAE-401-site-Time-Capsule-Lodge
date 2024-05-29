import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { HttpClient} from '@angular/common/http';
import { SharedService } from '../shared.service';

@Component({
  selector: 'app-catalogue',
  templateUrl: './catalogue.component.html',
  styleUrls: ['./catalogue.component.scss']
})
export class CatalogueComponent {

  currentUrl: string = '';

    constructor(private httpClient: HttpClient, private router: Router, private sharedService: SharedService) {}
  
  
  monTableau:any[]=[];
  categorie:any[]=[];
  displayedElements: any[] = [];
  titreCategorie: string = '';
  api_link: string = '';

  // Méthode pour vérifier si un élément a déjà été affiché
  isElementDisplayed(element: any): boolean {
    return this.displayedElements.some((e) => e.id === element.id);
  }
  getCategory(categoryId: number): { nom: string, lien: string } {
    const category = this.categorie.find(cat => cat.id === categoryId);
    return category ? { nom: category.nom, lien: category.lien } : { nom: 'Catégorie inconnue', lien: '' };
  }
  ngOnInit(){
    this.currentUrl = this.router.url;
    this.api_link = this.currentUrl.slice(1)[0].toUpperCase()+this.currentUrl.slice(2);
    console.log(this);
//    if (this.currentUrl == '/evenement') {
    this.httpClient
      .get<any>('http://mvcangular/api/article_categorie/'+this.api_link)
      .subscribe( //HttpClient retourne un observable
        (reponse) =>{
          console.log(reponse);
          let prixmax = this.sharedService.prixMax;
          this.monTableau = reponse.donnee.filter(function(data : any){return data.prix<prixmax});
          this.sharedService.monTableau = this.monTableau;
          this.titreCategorie = this.api_link;
          console.log(this.monTableau);
        },
        (error) =>{
          console.log('Erreur dans la récupération des données :'+ error);
        }
      )
    // } else if (this.currentUrl == '/epoque') {
    //   this.httpClient
    //   .get<any>('http://mvcangular/api/article_categorie/Epoque')
    //   .subscribe( //HttpClient retourne un observable
    //     (reponse) =>{
    //       //console.log(reponse);
    //       this.monTableau = reponse.donnee;
    //       this.titreCategorie = 'Époque';
    //       //console.log(this.monTableau);
    //       this.sharedService.monTableau = this.monTableau;
    //       //console.log("test");
    //       //console.log(this.sharedService.monTableau);
    //       //console.log("dfghjklm");
    //     },
    //     (error) =>{
    //       console.log('Erreur dans la récupération des données :'+ error);
    //     }
    //   )
      
    // }
    
  }



  /*click(){
    this.httpClient
      .post<any[]>('http://mvcangular/angular/evenement')
      .subscribe( //HttpClient retourne un observable
        (reponse) =>{
          console.log(reponse);
          this.monTableau = reponse;
        },
        (error) =>{
          console.log('Erreur dans la récupération des données :'+ error);
        }
      )
  }*/
}
