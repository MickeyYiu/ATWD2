import { Component, OnInit, Output, EventEmitter  } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';  
import { HttpClient, HttpResponse } from '@angular/common/http';
import { LcsdRecord } from '../LcsdRecord.model';

@Component({
  selector: 'app-search-lcsd',
  templateUrl: './search-lcsd.component.html',
  styleUrls: ['./search-lcsd.component.css']
})

export class SearchLcsdComponent implements OnInit {
  searchlcsdForm: FormGroup;
  http: HttpClient;
  serverData!: Object | null;
  url!: string;
  serverDataArr!: any;

  lcsdRecord: LcsdRecord = {
    id : "",
    District_en : "",
    District_cn : "",
    Name_en : "",
    Name_cn : "",
    Address_en : "",
    Address_cn : "",
    GIHS : "",
    Court_no_en : "",
    Court_no_cn : "",
    Ancillary_facilities_en : "",
    Ancillary_facilities_cn : "",
    Opening_hours_en : "",
    Opening_hours_cn : "",
    Phone : "",
    Remarks_en : "",
    Remarks_cn : "",
    Longitude : "",
    Latitude : ""
  }

  constructor(fb: FormBuilder, http: HttpClient) { 
    this.http = http;
    this.searchlcsdForm = fb.group(
      {
        'inputtype': ['', Validators.required ],
        'inputvalue': ['', Validators.required ],
        'Asc_or_Desc': ['', Validators.required ]
      }
    );
  }

  ngOnInit(): void {
  }
@Output() addEvent = new EventEmitter();
  addButtonHandler(){
    console.log("hi");
    this.addEvent.emit();
  }

@Output() deleteEvent = new EventEmitter<LcsdRecord>();
  deleteButtonHandler(id: string) {
    console.log(id);
    for (let lcsd of this.serverDataArr) {
      if (id === lcsd.id) {
        this.lcsdRecord.id = lcsd.id;
        this.lcsdRecord.District_en = lcsd.District_en;
        this.lcsdRecord.District_cn = lcsd.District_cn;
        this.lcsdRecord.Name_en = lcsd.Name_en;
        this.lcsdRecord.Name_cn = lcsd.Name_cn
        this.lcsdRecord.Address_en = lcsd.Address_en
        this.lcsdRecord.Address_cn = lcsd.Address_cn
        this.lcsdRecord.GIHS = lcsd.GIHS
        this.lcsdRecord.Court_no_en = lcsd.Court_no_en
        this.lcsdRecord.Court_no_cn = lcsd.Court_no_cn
        this.lcsdRecord.Ancillary_facilities_en = lcsd.Ancillary_facilities_en
        this.lcsdRecord.Ancillary_facilities_cn =  lcsd.Ancillary_facilities_cn 
        this.lcsdRecord.Opening_hours_en = lcsd.Opening_hours_en
        this.lcsdRecord.Opening_hours_cn = lcsd.Opening_hours_cn
        this.lcsdRecord.Phone = lcsd.Phone
        this.lcsdRecord.Remarks_en = lcsd.Remarks_en 
        this.lcsdRecord.Remarks_cn = lcsd.Remarks_cn
        this.lcsdRecord.Longitude = lcsd.Longitude
        this.lcsdRecord.Latitude = lcsd.Latitude
      }
    }

    this.deleteEvent.emit(this.lcsdRecord);
  }

@Output() updateEvent = new EventEmitter<LcsdRecord>();
  updateButtonHandler(id: string) {
    console.log(id);
    for (let lcsd of this.serverDataArr) {
      if (id === lcsd.id) {
        this.lcsdRecord.id = lcsd.id;
        this.lcsdRecord.District_en = lcsd.District_en;
        this.lcsdRecord.District_cn = lcsd.District_cn;
        this.lcsdRecord.Name_en = lcsd.Name_en;
        this.lcsdRecord.Name_cn = lcsd.Name_cn
        this.lcsdRecord.Address_en = lcsd.Address_en
        this.lcsdRecord.Address_cn = lcsd.Address_cn
        this.lcsdRecord.GIHS = lcsd.GIHS
        this.lcsdRecord.Court_no_en = lcsd.Court_no_en
        this.lcsdRecord.Court_no_cn = lcsd.Court_no_cn
        this.lcsdRecord.Ancillary_facilities_en = lcsd.Ancillary_facilities_en
        this.lcsdRecord.Ancillary_facilities_cn =  lcsd.Ancillary_facilities_cn 
        this.lcsdRecord.Opening_hours_en = lcsd.Opening_hours_en
        this.lcsdRecord.Opening_hours_cn = lcsd.Opening_hours_cn
        this.lcsdRecord.Phone = lcsd.Phone
        this.lcsdRecord.Remarks_en = lcsd.Remarks_en 
        this.lcsdRecord.Remarks_cn = lcsd.Remarks_cn
        this.lcsdRecord.Longitude = lcsd.Longitude
        this.lcsdRecord.Latitude = lcsd.Latitude
      }
    }
    this.updateEvent.emit(this.lcsdRecord);
  }

  onSubmit(formValue: any): void {
    console.log(formValue);
    this.serverData = null;
    
    this.url = "http://localhost/rest/index.php/Lcsd/" + formValue["inputtype"] 
    + "/" + formValue["inputvalue"] + "/" + formValue["Asc_or_Desc"];
   
    this.http.get<any>(this.url).subscribe(
      res => {    // anonymous function when AJAX succeeded 
        console.log(res);
        this.serverData = res;
        this.serverDataArr = JSON.parse(JSON.stringify(res));
      },
      res => {    // anonymous function when AJAX failed
        console.log("Server error:" + res);
      }
    );  
  }
}