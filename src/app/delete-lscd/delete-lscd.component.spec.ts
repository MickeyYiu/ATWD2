import { ComponentFixture, TestBed } from '@angular/core/testing';
import { DeleteLscdComponent } from './delete-lscd.component';

describe('DeleteLscdComponent', () => {
  let component: DeleteLscdComponent;
  let fixture: ComponentFixture<DeleteLscdComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DeleteLscdComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DeleteLscdComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
