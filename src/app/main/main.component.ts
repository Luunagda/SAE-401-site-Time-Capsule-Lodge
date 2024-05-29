import { Component, OnInit, Input, Injectable } from '@angular/core';
import { OwlOptions } from 'ngx-owl-carousel-o';

import { HttpClient} from '@angular/common/http';


@Component({
  selector: 'app-main',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.scss']
})

@Injectable()
export class MainComponent {
  
  constructor(private httpClient: HttpClient){}
  customOptions: OwlOptions = {
    autoWidth: true,
    autoplay: true,
    loop: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    dots: false,
    navSpeed: 400,
    navText: ['&#8249', '&#8250;'],
    center: true,
    responsive: {
      0: {
        items: 1 
      },
      400: {
        items: 1
      },
      760: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    nav: true
  }
  monTableau:any[]=[];

  ngOnInit(){
    this.httpClient
      .get<any[]>('http://mvcangular/angular')
      .subscribe( //HttpClient retourne un observable
        (reponse) =>{
          console.log(reponse);
          this.monTableau = reponse;
        },
        (error) =>{
          console.log('Erreur dans la récupération des données :'+ error);
        }
      )
  }
}
