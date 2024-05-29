import { Component } from '@angular/core';
import { AuthGuard } from './auth.guard'; // Importez le garde de routage
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';






@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  constructor(private modalService: NgbModal) {

  }

  public open(modal: any): void {

    this.modalService.open(modal);

  }
  title = 'sitesae301';

}
