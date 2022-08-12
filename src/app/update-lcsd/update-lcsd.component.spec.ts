import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateLcsdComponent } from './update-lcsd.component';

describe('UpdateLcsdComponent', () => {
  let component: UpdateLcsdComponent;
  let fixture: ComponentFixture<UpdateLcsdComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ UpdateLcsdComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(UpdateLcsdComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
