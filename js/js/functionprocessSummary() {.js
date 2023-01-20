function processSummary() {
  //Incident details summary ids
  const sum_inc_date = document.getElementById("sum_incidence_date");
  const sum_inc_loc = document.getElementById("sum_incidence_loc");
  const sum_inc_desc = document.getElementById("sum_incidence_desc");
  const sum_inc_causer = document.getElementById("sum_incidence_causer");
  const sum_damage_desc = document.getElementById("sum_damage_desc");
  const sum_current_vehicle_loc = document.getElementById(
    "sum_current_vehicle_loc"
  );
  //Form field ID for Incident details
  const form_incident_date = document.getElementById("incident_date");
  const form_incident_location = document.getElementById("incident_location");
  const form_incident_desc = document.getElementById("incident_desc");
  const form_incident_causer = document.getElementById("incident_causer");
  const form_vehicle_damge_desc = document.getElementById("vehicle_damge_desc");
  const form_vehicle_location = document.getElementById("vehicle_location");
  //Police report summary IDs
  var reported = "";
  const sum_police_reported = document.getElementById("sum_police_reported");
  const sum_police_reported_name = document.getElementById(
    "sum_police_reported_name"
  );
  const sum_police_reported_station = document.getElementById(
    "sum_police_reported_station"
  );

  //Form fields for Police report
  const form_accidentreportedno = document.getElementById("accidentreportedno");
  const form_accidentreportedyes = document.getElementById(
    "accidentreportedyes"
  );
  const form_officer_name = document.getElementById("officer_name");
  const form_officer_station = document.getElementById("officer_station");

  $(document).ready(function () {
    sum_inc_date.innerHTML = form_incident_date.value;
    sum_inc_loc.innerHTML = form_incident_location.value;
    sum_inc_desc.innerHTML = form_incident_desc.value;
    sum_inc_causer.innerHTML = form_incident_causer.value;
    sum_damage_desc.innerHTML = form_vehicle_damge_desc.value;
    sum_current_vehicle_loc.innerHTML = form_vehicle_location.value;

    if (form_accidentreportedno.checked) {
      reported = "No";
    }
    if (form_accidentreportedno.checked) {
      reported = "Yes";
    }
    sum_police_reported.innerHTML = reported;
    sum_police_reported_name.innerHTML = form_officer_name.value;
    sum_police_reported_station.innerHTML = form_officer_station.value;
  });
}
/////////////////////////////////////////////////////////
