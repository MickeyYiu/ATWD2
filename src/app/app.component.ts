import { Component } from '@angular/core';
import { LcsdRecord } from './LcsdRecord.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  title = 'rest';
  deleteEventTriggered: boolean = false;
  updateEventTriggered: boolean = false;
  addEventTriggered: boolean = false;
  lcsdRecord!: LcsdRecord;

  addEventReceiver() {
    console.log("App: addEvent received");
    this.addEventTriggered = true;
  }


  deleteEventReceiver(lcsdRecord: LcsdRecord) {
   /* console.log("ID: " + lcsdRecord.ID);
    console.log("District_en: " + lcsdRecord.District_en);
    console.log("District_cn: " + lcsdRecord.District_cn);
    console.log("Name_en: " + lcsdRecord.Name_en);
    console.log("Name_cn : " + lcsdRecord.Name_cn);
    console.log("Address_en : " + lcsdRecord.Address_en);
    console.log("Address_cn : " + lcsdRecord.Address_cn);
    console.log("GIHS: " + lcsdRecord.GIHS);
    console.log("Court_no_en: " + lcsdRecord.Court_no_en);
    console.log("Court_no_cn: " + lcsdRecord.Court_no_cn);
    console.log("Ancillary_facilities_en: " + lcsdRecord.Ancillary_facilities_en);
    console.log("Ancillary_facilities_cn: " + lcsdRecord.Ancillary_facilities_cn);
    console.log("Opening_hours_en : " + lcsdRecord.Opening_hours_en);
    console.log("Opening_hours_cn : " + lcsdRecord.Opening_hours_cn);
    console.log("Phone : " + lcsdRecord.Phone);
    console.log("Remarks_en : " + lcsdRecord.Remarks_en);
    console.log("Remarks_cn: " + lcsdRecord.Remarks_cn);
    console.log("Longitude : " + lcsdRecord.Longitude);
    console.log("Latitude : " + lcsdRecord.Latitude);
    console.log("App: deleteEvent received");*/
    this.lcsdRecord = lcsdRecord;
    this.deleteEventTriggered = true;
  }

  updateEventReceiver(lcsdRecord: LcsdRecord) {
   /* console.log("ID: " + lcsdRecord.ID);
    console.log("District_en: " + lcsdRecord.District_en);
    console.log("District_cn: " + lcsdRecord.District_cn);
    console.log("Name_en: " + lcsdRecord.Name_en);
    console.log("Name_cn : " + lcsdRecord.Name_cn);
    console.log("Address_en : " + lcsdRecord.Address_en);
    console.log("Address_cn : " + lcsdRecord.Address_cn);
    console.log("GIHS: " + lcsdRecord.GIHS);
    console.log("Court_no_en: " + lcsdRecord.Court_no_en);
    console.log("Court_no_cn: " + lcsdRecord.Court_no_cn);
    console.log("Ancillary_facilities_en: " + lcsdRecord.Ancillary_facilities_en);
    console.log("Ancillary_facilities_cn: " + lcsdRecord.Ancillary_facilities_cn);
    console.log("Opening_hours_en : " + lcsdRecord.Opening_hours_en);
    console.log("Opening_hours_cn : " + lcsdRecord.Opening_hours_cn);
    console.log("Phone : " + lcsdRecord.Phone);
    console.log("Remarks_en : " + lcsdRecord.Remarks_en);
    console.log("Remarks_cn: " + lcsdRecord.Remarks_cn);
    console.log("Longitude : " + lcsdRecord.Longitude);
    console.log("Latitude : " + lcsdRecord.Latitude);
    console.log("App: updateEvent received");*/
    this.lcsdRecord = lcsdRecord;
    this.updateEventTriggered = true;
  }
  
  cancelDeleteEventReceiver() {
    console.log("App: cancelDeleteEvent received");
    this.deleteEventTriggered = false;
  }

  cancelUpdateEventReceiver() {
    console.log("App: cancelupdateEvent received");
    this.updateEventTriggered = false;
  }

  cancelAddEventReceiver(){
    console.log("App: cancelAddEvent received");
    this.addEventTriggered = false;
  }
}
