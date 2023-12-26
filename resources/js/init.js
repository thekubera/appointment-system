(function() {
  'use strict';

    $(document).ready(function() {
     
      // switch pages
      switch($('body').data('page-id')) {
        case 'officer':
          APPOINTMENT.officer.insertOfficerDetail();
          APPOINTMENT.officer.toggleOfficerStatus();
          APPOINTMENT.officer.editOfficer();
        break;
        case 'visitor':
          APPOINTMENT.visitor.insertVisitorDetail();
          APPOINTMENT.visitor.toggleVisitorStatus();
          APPOINTMENT.visitor.editVisitor();
        break;
        case 'activity':
          APPOINTMENT.activity.insertActivity();
          APPOINTMENT.activity.fetchActivity();
          APPOINTMENT.activity.filterBasedOnType();
          APPOINTMENT.activity.filterBasedOnStatus();
          APPOINTMENT.activity.filterBasedOnOfficer();
          APPOINTMENT.activity.filterBasedOnVisitor();
          APPOINTMENT.activity.filterBasedOnDate();
          APPOINTMENT.activity.filterBasedOnTime();
          APPOINTMENT.activity.fetchActivityBasedOnID();
          APPOINTMENT.activity.editActivity();
          APPOINTMENT.activity.cancelActivity();
        break;
        default:
          // nothing
      }

    });

})();