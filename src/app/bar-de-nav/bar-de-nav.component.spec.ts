import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BarDeNavComponent } from './bar-de-nav.component';

describe('BarDeNavComponent', () => {
  let component: BarDeNavComponent;
  let fixture: ComponentFixture<BarDeNavComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [BarDeNavComponent]
    });
    fixture = TestBed.createComponent(BarDeNavComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
