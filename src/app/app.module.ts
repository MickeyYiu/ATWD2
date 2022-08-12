import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormGroup, FormBuilder, Validators} from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { SearchLcsdComponent } from './search-lcsd/search-lcsd.component';
import { HttpClientModule } from '@angular/common/http';
import { CreateLscdComponent } from './create-lscd/create-lscd.component';
import { DeleteLscdComponent } from './delete-lscd/delete-lscd.component';
import { UpdateLcsdComponent } from './update-lcsd/update-lcsd.component';

@NgModule({
  declarations: [
    AppComponent,
    SearchLcsdComponent,
    CreateLscdComponent,
    DeleteLscdComponent,
    UpdateLcsdComponent
  ],
  imports: [
    BrowserModule,
    FormsModule, 
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
