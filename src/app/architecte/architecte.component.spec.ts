import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ArchitecteComponent } from './architecte.component';

describe('ArchitecteComponent', () => {
  let component: ArchitecteComponent;
  let fixture: ComponentFixture<ArchitecteComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ArchitecteComponent]
    });
    fixture = TestBed.createComponent(ArchitecteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
