import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CartepayerComponent } from './cartepayer.component';

describe('CartepayerComponent', () => {
  let component: CartepayerComponent;
  let fixture: ComponentFixture<CartepayerComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CartepayerComponent]
    });
    fixture = TestBed.createComponent(CartepayerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
