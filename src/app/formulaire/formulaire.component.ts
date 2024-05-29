import { Component } from '@angular/core';

import { HttpClient} from '@angular/common/http';


@Component({
  selector: 'app-formulaire',
  templateUrl: './formulaire.component.html',
  styleUrls: ['./formulaire.component.scss']
})
export class FormulaireComponent {
  constructor(private httpClient: HttpClient){}

}
