import { TestBed } from '@angular/core/testing';

import { AuthService } from './auth.service';
//  NE SERT A RIEN MAIS NE LE SUPPRIME PAS POUR PAS CASSER LE CODE

describe('AuthService', () => {
  let service: AuthService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(AuthService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
