import { Component } from '@angular/core';
import { HttpClient} from '@angular/common/http';


@Component({
  selector: 'app-cartepayer',
  templateUrl: './cartepayer.component.html',
  styleUrls: ['./cartepayer.component.scss']
})
export class CartepayerComponent {
  constructor(private httpClient: HttpClient){}


  ngAfterViewInit() {
    // Chargez le fichier JavaScript externe
    let script = document.createElement('script');
    script.src = './assets/js/catalogue.js';
    document.body.appendChild(script);

    script = document.createElement('script');
    script.src = './assets/js/carte.js';
    document.body.appendChild(script);

    script = document.createElement('script');
    script.src = './assets/js/payer.js';
    document.body.appendChild(script);
  }
}
