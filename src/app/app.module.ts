import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { AppComponent } from './app.component';
import { BarDeNavComponent } from './bar-de-nav/bar-de-nav.component';
import { MainComponent } from './main/main.component';

import { SlickCarouselModule } from 'ngx-slick-carousel';

import { CarouselModule } from 'ngx-owl-carousel-o';
import { FooterComponent } from './footer/footer.component';
import { ReactiveFormsModule } from '@angular/forms';

import { FormsModule } from '@angular/forms'; // Importez FormsModule pour utiliser [(ngModel)].

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { HttpClientModule } from '@angular/common/http';

import { RouterModule } from '@angular/router';
import { ClientComponent } from './client/client.component';
import { LieuComponent } from './lieu/lieu.component';
import { AproposComponent } from './apropos/apropos.component';
import { FiltreComponent } from './filtre/filtre.component';
import { MentionsLegalesComponent } from './mentions-legales/mentions-legales.component';
import { PanierComponent } from './panier/panier.component';
import { FormulaireComponent } from './formulaire/formulaire.component';
import { CartepayerComponent } from './cartepayer/cartepayer.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { ArchitecteComponent } from './architecte/architecte.component';
import { DetailChambreComponent } from './detail-chambre/detail-chambre.component';
import { CatalogueComponent } from './catalogue/catalogue.component';
import { AuthGuard } from './auth.guard'; // Importez le garde de routage






@NgModule({
  declarations: [
    AppComponent,
    BarDeNavComponent,
    MainComponent,
    FooterComponent,
    ClientComponent,
    CatalogueComponent,
    LieuComponent,
    AproposComponent,
    FiltreComponent,
    MentionsLegalesComponent,
    PanierComponent,
    FormulaireComponent,
    CartepayerComponent,
    ConnexionComponent,
    ArchitecteComponent,
    DetailChambreComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,
    NgbModule,
    FormsModule,
    SlickCarouselModule,
    CarouselModule, 
    ReactiveFormsModule,
    RouterModule.forRoot([
      {path:'',component : MainComponent},
      {path:'evenement/detail-chambre/:slug',component : DetailChambreComponent},
      {path:'epoque/detail-chambre/:slug',component : DetailChambreComponent},
      {path:'lieu/detail-chambre/:slug',component : DetailChambreComponent},
      {path:'epoque',component : ArchitecteComponent},
      {path:'evenement',component : ArchitecteComponent},
      {path:'lieu',component : LieuComponent},
      {path:'apropos',component : AproposComponent},
      {path:'mentionslegales',component : MentionsLegalesComponent},
      {path:'panier',component : PanierComponent},
      {path:'formulaire',component : FormulaireComponent},
      {path:'cartepayer',component : CartepayerComponent},
      {path:'connexion',component : ConnexionComponent},
      {path:'client',component : ClientComponent, canActivate: [AuthGuard] }
])
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
