import { Component, OnInit, Output, EventEmitter, Input, OnChanges } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { LcsdRecord } from '../LcsdRecord.model';

@Component({
  selector: 'app-update-lcsd',
  templateUrl: './update-lcsd.component.html',
  styleUrls: ['./update-lcsd.component.css']
})

export class UpdateLcsdComponent implements OnInit {
  http: HttpClient;
  serverData!: Object | null;
  url!: string;
  updatelcsdForm: FormGroup;
  serverDataArr: any;
  @Input() lcsdRecord!: LcsdRecord;

  constructor(fb: FormBuilder, http: HttpClient) {
    this.http = http;
    this.updatelcsdForm = fb.group({
      'id': ['', Validators.required],
      'District_en': [],
      'District_cn': [],
      'Name_en': [],
      'Name_cn': [],
      'Address_en': [],
      'Address_cn': [],
      'GIHS': [],
      'Court_no_en': [],
      'Court_no_cn': [],
      'Ancillary_facilities_en': [],
      'Ancillary_facilities_cn': [],
      'Opening_hours_en': [],
      'Opening_hours_cn': [],
      'Phone': [],
      'Remarks_en': [],
      'Remarks_cn': [],
      'Longitude': [],
      'Latitude': []
    });
  }

  onSubmit(formValue: any): void {
    this.serverData = "";
    this.url = "http://localhost/rest/index.php/Lcsd/Updateid/" + formValue["id"] + "/" + formValue["District_en"] + "/" + formValue["District_cn"] + "/" +
      formValue["Name_en"] + "/" + formValue["Name_cn"] + "/" + formValue["Address_en"] + "/" + formValue["Address_cn"] + "/" +
      formValue["GIHS"] + "/" + formValue["Court_no_en"] + "/" + formValue["Court_no_cn"] + "/" + formValue["Ancillary_facilities_en"] + "/" +
      formValue["Ancillary_facilities_cn"] + "/" + formValue["Opening_hours_en"] + "/" +
      formValue["Opening_hours_cn"] + "/" + formValue["Phone"] + "/" + formValue["Remarks_en"] + "/" +
      formValue["Remarks_cn"] + "/" + formValue["Longitude"] + "/" + formValue["Latitude"];

    this.http.put < any > (
      this.url, {
        id: formValue['id'],
        District_en: formValue['District_en'],
        District_cn: formValue['District_cn'],
        Name_en: formValue['Name_en'],
        Name_cn: formValue['Name_cn'],
        Address_en: formValue['Address_en'],
        Address_cn: formValue['Address_cn'],
        GIHS: formValue['GIHS'],
        Court_no_en: formValue['Court_no_en'],
        Court_no_cn: formValue['Court_no_cn'],
        Ancillary_facilities_en: formValue['Ancillary_facilities_en'],
        Ancillary_facilities_cn: formValue['Ancillary_facilities_cn'],
        Opening_hours_en: formValue['Opening_hours_en'],
        Opening_hours_cn: formValue['Opening_hours_cn'],
        Phone: formValue['Phone'],
        Remarks_en: formValue['Remarks_en'],
        Remarks_cn: formValue['Remarks_cn'],
        Longitude: formValue['Longitude'],
        Latitude: formValue['Latitude'],
      }
    ).subscribe(
      res => { // anonymous
        console.log("Server return: " + res);
        this.serverData = res;
        this.serverDataArr = JSON.parse(JSON.stringify(res));
      },
      res => {
        console.log("Server error: " + res);
        this.serverData = res;
      }
    );
    setTimeout(function() {
      document.getElementById("close_update")?.click();
  }, 5000);  
   
  }


  @Output() cancelUpdateEvent = new EventEmitter();
  cancelupdateButtonHandler() {
    this.cancelUpdateEvent.emit();
  }

  ngOnInit(): void {

  }

  ngOnChanges() {
    /*console.log("ID: " + this.lcsdRecord.ID);
    console.log("District_en: " + this.lcsdRecord.District_en);
    console.log("District_cn: " + this.lcsdRecord.District_cn);
    console.log("Name_en: " + this.lcsdRecord.Name_en);
    console.log("Name_cn : " + this.lcsdRecord.Name_cn);
    console.log("Address_en : " + this.lcsdRecord.Address_en);
    console.log("Address_cn : " + this.lcsdRecord.Address_cn);
    console.log("GIHS: " + this.lcsdRecord.GIHS);
    console.log("Court_no_en: " + this.lcsdRecord.Court_no_en);
    console.log("Court_no_cn: " + this.lcsdRecord.Court_no_cn);
    console.log("Ancillary_facilities_en: " + this.lcsdRecord.Ancillary_facilities_en);
    console.log("Ancillary_facilities_cn: " + this.lcsdRecord.Ancillary_facilities_cn);
    console.log("Opening_hours_en : " + this.lcsdRecord.Opening_hours_en);
    console.log("Opening_hours_cn : " + this.lcsdRecord.Opening_hours_cn);
    console.log("Phone : " + this.lcsdRecord.Phone);
    console.log("Remarks_en : " + this.lcsdRecord.Remarks_en);
    console.log("Remarks_cn: " + this.lcsdRecord.Remarks_cn);
    console.log("Longitude : " + this.lcsdRecord.Longitude);
    console.log("Latitude : " + this.lcsdRecord.Latitude);*/
    this.updatelcsdForm.controls['id'].setValue(this.lcsdRecord.id);
    this.updatelcsdForm.controls['District_en'].setValue(this.lcsdRecord.District_en);
    this.updatelcsdForm.controls['District_cn'].setValue(this.lcsdRecord.District_cn);
    this.updatelcsdForm.controls['Name_en'].setValue(this.lcsdRecord.Name_en);
    this.updatelcsdForm.controls['Name_cn'].setValue(this.lcsdRecord.Name_cn);
    this.updatelcsdForm.controls['Address_en'].setValue(this.lcsdRecord.Address_en);
    this.updatelcsdForm.controls['Address_cn'].setValue(this.lcsdRecord.Address_cn);
    this.updatelcsdForm.controls['GIHS'].setValue(this.lcsdRecord.GIHS);
    this.updatelcsdForm.controls['Court_no_en'].setValue(this.lcsdRecord.Court_no_en);
    this.updatelcsdForm.controls['Court_no_cn'].setValue(this.lcsdRecord.Court_no_cn);
    this.updatelcsdForm.controls['Ancillary_facilities_en'].setValue(this.lcsdRecord.Ancillary_facilities_en);
    this.updatelcsdForm.controls['Ancillary_facilities_cn'].setValue(this.lcsdRecord.Ancillary_facilities_cn);
    this.updatelcsdForm.controls['Opening_hours_en'].setValue(this.lcsdRecord.Opening_hours_en);
    this.updatelcsdForm.controls['Opening_hours_cn'].setValue(this.lcsdRecord.Opening_hours_cn);
    this.updatelcsdForm.controls['Phone'].setValue(this.lcsdRecord.Phone);
    this.updatelcsdForm.controls['Remarks_cn'].setValue(this.lcsdRecord.Remarks_cn);
    this.updatelcsdForm.controls['Remarks_en'].setValue(this.lcsdRecord.Remarks_en);
    this.updatelcsdForm.controls['Longitude'].setValue(this.lcsdRecord.Longitude);
    this.updatelcsdForm.controls['Latitude'].setValue(this.lcsdRecord.Latitude);
  }
}
