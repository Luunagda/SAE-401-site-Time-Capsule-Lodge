import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { SharedService } from '../shared.service';

@Component({
  selector: 'app-filtre',
  templateUrl: './filtre.component.html',
  styleUrls: ['./filtre.component.scss']
})
export class FiltreComponent {
  formulaire: FormGroup;
  filteredElements: any[] = [];

  constructor(private formBuilder: FormBuilder, private sharedService: SharedService) {
    this.formulaire = this.formBuilder.group({
      prix: [[]], // Initialisez avec un tableau vide
      epoque: [[]],
      lieu_id: [[]],
      type_chambre: [[]],
    });
    console.log(this.formulaire.value);
    console.log(this.formulaire);
  }

  //fonction filterElements qui prend en paramètre le tableau d'éléments à filtrer
  filterElements() {
    console.log(this.sharedService.monTableau);
    console.log(this.formulaire.value);
    this.sharedService.prixMax = 40000;
    let prixmax = this.sharedService.prixMax;
    this.sharedService.monTableau = this.sharedService.monTableau.filter(function(data : any){return data.prix<prixmax});
    this.filteredElements = this.sharedService.monTableau.filter((element) => {
      // On récupère les valeurs du formulaire
      const formValues = this.formulaire.value;
      // On initialise un tableau de booléens
      const conditions :any = [];
      // On parcourt les clés de formValues
      Object.keys(formValues).forEach((key) => {
        // Si la clé est prix
        if (key === 'prix') {
          // On vérifie que le prix de l'élément est dans le tableau des prix sélectionnés
          conditions.push(formValues[key].includes(element[key]));
        } else {
          // Sinon on vérifie que la valeur de l'élément est dans le tableau correspondant
          conditions.push(formValues[key].includes(element[key]));
        }
      });
      console.log(this.sharedService.monTableau);
      // Si toutes les conditions sont vraies, on garde l'élément
      return conditions.every(Boolean);
    });
  }
  
}
