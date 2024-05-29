import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, FormControl } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-client',
  templateUrl: './client.component.html',
  styleUrls: ['./client.component.scss']
})
export class ClientComponent implements OnInit {

  userId: number;
  userData: any = {};
  id : any;
  telephone : any;
  adresse : any;
  login : any;
  password : any;
  email : any;
  imageprofil : any;
  motdepasse : any;

  constructor(
    private formBuilder: FormBuilder,
    private httpClient: HttpClient,
    private route: ActivatedRoute,
    private router: Router
  ) {
    this.userId = Number(localStorage.getItem('userId'));

    if (!this.userId || isNaN(this.userId)) {
      this.router.navigate(['/connexion']);
    }
  }
  formClient = new FormGroup({
    telephone: new FormControl(''),
    adresse: new FormControl(''),
    login: new FormControl(''),
    password: new FormControl(''),
    email: new FormControl(''),
    imageprofil: new FormControl('')

  }); 
  ngOnInit() {
   

    this.httpClient
      .get<any>('http://mvcangular/api/updateUtilisateurs/' + this.userId)
      .subscribe(
        (reponse) => {
          this.userData = reponse.donnee;

          //this.formClient.patchValue(this.userData);
          this.userData = reponse.donnee;
          this.motdepasse = this.userData.password;
          this.telephone = this.userData.telephone;
          this.adresse = this.userData.adresse;
          this.login = this.userData.login;
          this.password = this.userData.password;
          this.email = this.userData.email;
          this.imageprofil = this.userData.imageprofil;

        },
        (error) => {
          console.error('Erreur dans la récupération des données :' + error);
        }
      );
  }

  UpdateUtilisateur() {
    const updatedUserData = this.formClient.value;
    console.log(updatedUserData);
    //si l'élément n'est pas modifi dans le form, l'élément vaut par défaut sa valeur initial

    //il y a un bug avec le mot de passe. Il se met à jour tout seul automatiquement 
    //identifiants qui fonctionnent tant qu'ils ont pas été modifiés :
    //login : test
    //mot de passe : test 
    
    if(updatedUserData.password == ""){
      updatedUserData.password = this.motdepasse;  
    } 

    console.log(this.motdepasse);
    if (updatedUserData.adresse == ""){
      updatedUserData.adresse = this.userData.adresse;
    } 
    if (updatedUserData.telephone == ""){
      updatedUserData.telephone = this.userData.telephone;
    } 
    if (updatedUserData.email == ""){
      updatedUserData.email = this.userData.email;
    } 
    if (updatedUserData.imageprofil == ""){
      updatedUserData.imageprofil = this.userData.imageprofil;
    } 
    if (updatedUserData.login == ""){
      updatedUserData.login = this.userData.login;
    }
    console.log(updatedUserData);
    
//pour mettre à jour ses données : 
    this.httpClient
      .put<any>('http://mvcangular/api/updatesaveUtilisateurs/' + this.userId, updatedUserData)
      .subscribe(
        (reponse) => {
          console.log('Utilisateur mis à jour avec succès', reponse);
          this.router.navigate(['/']);
        },
        (error) => {
          console.error('Erreur lors de la mise à jour de l\'utilisateur', error);
          // Gérez les erreurs ici
        }
      );
  }
}



