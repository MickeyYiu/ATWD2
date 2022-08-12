import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateLscdComponent } from './create-lscd.component';

describe('CreateLscdComponent', () => {
  let component: CreateLscdComponent;
  let fixture: ComponentFixture<CreateLscdComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CreateLscdComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateLscdComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
