import { Component, OnInit, Output, EventEmitter, Input, OnChanges} from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { LcsdRecord } from '../LcsdRecord.model';

@Component({
  selector: 'app-delete-lscd',
  templateUrl: './delete-lscd.component.html',
  styleUrls: ['./delete-lscd.component.css']
})
export class DeleteLscdComponent implements OnInit {
  http: HttpClient;
  serverData!: Object;
  url!: string;
  deletelcsdForm: FormGroup;
  serverDataArr!: any;
  @Input() lcsdRecord!: LcsdRecord;

  constructor(fb: FormBuilder, http: HttpClient) {
    this.http = http;

    this.deletelcsdForm = fb.group(
      {
        'id': ['', Validators.required],
        'District_en': [], 
        'District_cn':[], 
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
      }
    );
   }

  ngOnInit(): void {
  }

  @Output() cancelDeleteEvent = new EventEmitter();

  canceldeleteButtonHandler() {
    this.cancelDeleteEvent.emit();
  }


  onSubmit(formValue: any): void {
    console.log("Delete: " + formValue['id']);
    this.serverData = "";
    this.url = "http://localhost/rest/index.php/Lcsd/Deleteid/" + formValue['id'];

    this.http.delete<any>(this.url).subscribe(
      res => {    // anonymous function when AJAX succeeded 
        console.log(res);
        this.serverData = res;
        this.serverDataArr = JSON.parse(JSON.stringify(res));
      },
      res => {    // anonymous function when AJAX failed
        console.log("Server error:" + res);
      }
    );
    setTimeout(function() {
      document.getElementById("close_delete")?.click();
  }, 5000);  
  }
  ngOnChanges() {
    this.deletelcsdForm.controls['id'].setValue(this.lcsdRecord.id);
    this.deletelcsdForm.controls['District_en'].setValue(this.lcsdRecord.District_en);
    this.deletelcsdForm.controls['District_cn'].setValue(this.lcsdRecord.District_cn);
    this.deletelcsdForm.controls['Name_en'].setValue(this.lcsdRecord.Name_en);
    this.deletelcsdForm.controls['Name_cn'].setValue(this.lcsdRecord.Name_cn);
    this.deletelcsdForm.controls['Address_en'].setValue(this.lcsdRecord.Address_en);
    this.deletelcsdForm.controls['Address_cn'].setValue(this.lcsdRecord.Address_cn);
    this.deletelcsdForm.controls['GIHS'].setValue(this.lcsdRecord.GIHS);
    this.deletelcsdForm.controls['Court_no_en'].setValue(this.lcsdRecord.Court_no_en);
    this.deletelcsdForm.controls['Court_no_cn'].setValue(this.lcsdRecord.Court_no_cn);
    this.deletelcsdForm.controls['Ancillary_facilities_en'].setValue(this.lcsdRecord.Ancillary_facilities_en);
    this.deletelcsdForm.controls['Ancillary_facilities_cn'].setValue(this.lcsdRecord.Ancillary_facilities_cn);
    this.deletelcsdForm.controls['Opening_hours_en'].setValue(this.lcsdRecord.Opening_hours_en);
    this.deletelcsdForm.controls['Opening_hours_cn'].setValue(this.lcsdRecord.Opening_hours_cn);
    this.deletelcsdForm.controls['Phone'].setValue(this.lcsdRecord.Phone);
    this.deletelcsdForm.controls['Remarks_cn'].setValue(this.lcsdRecord.Remarks_cn);
    this.deletelcsdForm.controls['Remarks_en'].setValue(this.lcsdRecord.Remarks_en);
    this.deletelcsdForm.controls['Longitude'].setValue(this.lcsdRecord.Longitude);
    this.deletelcsdForm.controls['Latitude'].setValue(this.lcsdRecord.Latitude);
   /* console.log("ID: " + this.lcsdRecord.ID);
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

  }
}

