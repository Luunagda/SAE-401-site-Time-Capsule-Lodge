import { Component, OnInit, Input } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-architecte',
  templateUrl: './architecte.component.html',
  styleUrls: ['./architecte.component.scss']
})
export class ArchitecteComponent implements OnInit {
  currentItem = 'Television';
  currentUrl: string = '';

  constructor(private httpClient: HttpClient, private router: Router) {}
  
  ngOnInit() {
    this.currentUrl = this.router.url;
    console.log(this.currentUrl);
  }
  ngAfterViewInit() {
    // Chargez le fichier JavaScript externe
    let script = document.createElement('script');
    script.src = 'assets/js/catalogue.js';
    document.body.appendChild(script);
  }
}
