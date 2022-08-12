import { Component, OnInit, Output, EventEmitter, Input, OnChanges } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';  

@Component({
  selector: 'app-create-lscd',
  templateUrl: './create-lscd.component.html',
  styleUrls: ['./create-lscd.component.css']
})

export class CreateLscdComponent implements OnInit {
  http: HttpClient;
  serverData!: Object | null;
  serverDataArr: any;
  url!: string;
  createlcsdForm: FormGroup;

  constructor(fb: FormBuilder, http: HttpClient) { 
    this.http = http;
    this.createlcsdForm = fb.group({
      'ADistrict_en': ['', Validators.required],
      'ADistrict_cn': ['', Validators.required],
      'AName_en': ['', Validators.required],
      'AName_cn': ['', Validators.required],
      'AAddress_en': ['', Validators.required],
      'AAddress_cn': ['', Validators.required],
      'AGIHS': ['', Validators.required],
      'ACourt_no_en': ['', Validators.required],
      'ACourt_no_cn': ['', Validators.required],
      'AAncillary_facilities_en': ['', Validators.required],
      'AAncillary_facilities_cn': ['', Validators.required],
      'AOpening_hours_en': ['', Validators.required],
      'AOpening_hours_cn': ['', Validators.required],
      'APhone': ['', Validators.required],
      'ARemarks_en': ['', Validators.required],
      'ARemarks_cn': ['', Validators.required],
      'ALongitude': ['', Validators.required],
      'ALatitude': ['', Validators.required]
    });
  }
  
  ngOnInit(): void {
  }

  onSubmit(formValue: any): void {
    this.serverData = "";
    this.url = "http://localhost/rest/index.php/Lcsd/Add/" + formValue["ADistrict_en"] + "/" + formValue["ADistrict_cn"] + "/" +
    formValue["AName_en"] + "/" + formValue["AName_cn"] + "/" + formValue["AAddress_en"] + "/" + formValue["AAddress_cn"] + "/" 
    + formValue["AGIHS"] + "/"  + formValue["ACourt_no_en"] + "/"  + formValue["ACourt_no_cn"] + "/" + formValue["AAncillary_facilities_en"] + "/" 
    + formValue["AAncillary_facilities_cn"] + "/" + formValue["AOpening_hours_en"] + "/" 
    + formValue["AOpening_hours_cn"] + "/"  + formValue["APhone"] + "/" + formValue["ARemarks_en"] + "/" 
    + formValue["ARemarks_cn"] + "/"  + formValue["ALongitude"] + "/"  + formValue["ALatitude"]; 

    this.http.post<any>(
      this.url, 
      {      
        ADistrict_en : formValue['ADistrict_en'],
        ADistrict_cn: formValue['ADistrict_cn'],
        AName_en : formValue['AName_en'],
        AName_cn : formValue['AName_cn'],
        AAddress_en : formValue['AAddress_en'],
        AAddress_cn : formValue['AAddress_cn'],
        AGIHS : formValue['AGIHS'],
        ACourt_no_en : formValue['ACourt_no_en'],
        ACourt_no_cn : formValue['ACourt_no_cn'],
        AAncillary_facilities_en : formValue['AAncillary_facilities_en'],
        AAncillary_facilities_cn : formValue['AAncillary_facilities_cn'],
        AOpening_hours_en : formValue['AOpening_hours_en'],
        AOpening_hours_cn : formValue['AOpening_hours_cn'],
        APhone : formValue['APhone'],
        ARemarks_en : formValue['ARemarks_en'],
        ARemarks_cn : formValue['ARemarks_cn'],
        ALongitude : formValue['ALongitude'],
        ALatitude : formValue['ALatitude'],
      }
    ).subscribe(
      res => {  // anonymous
        console.log("Server return: " + res);
        this.serverData = res;
        this.serverDataArr = JSON.parse(JSON.stringify(res));
      },  
      res => {
        console.log("Server error: " + res);
        this.serverData = res;
      }
    );
  }
  
@Output() cancelAddEvent = new EventEmitter();
  cancelAddButtonHandler(){
    this.cancelAddEvent.emit();
  }
}
