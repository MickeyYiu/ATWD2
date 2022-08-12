import { ComponentFixture, TestBed } from '@angular/core/testing';
import { SearchLcsdComponent } from './search-lcsd.component';

describe('SearchLcsdComponent', () => {
  let component: SearchLcsdComponent;
  let fixture: ComponentFixture<SearchLcsdComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SearchLcsdComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SearchLcsdComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
