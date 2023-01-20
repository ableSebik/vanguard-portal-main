function processSummary() {
  /////////////incident details section
  const sum_inc_date = document.getElementById("sum_incidence_date");
  const sum_inc_loc = document.getElementById("sum_incidence_loc");
  const sum_inc_desc = document.getElementById("sum_incidence_desc");
  const sum_inc_causer = document.getElementById("sum_incidence_causer");
  const sum_damage_desc = document.getElementById("sum_damage_desc");
  const sum_current_vehicle_loc = document.getElementById(
    "sum_current_vehicle_loc"
  );

  sum_inc_date.innerHTML = document.getElementById("incident_date").value;
  sum_inc_loc.innerHTML = document.getElementById("incident_location").value;
  sum_inc_desc.innerHTML = document.getElementById("incident_desc").value;
  sum_inc_causer.innerHTML = document.getElementById("incident_causer").value;
  sum_damage_desc.innerHTML =
    document.getElementById("vehicle_damge_desc").value;
  sum_current_vehicle_loc.innerHTML =
    document.getElementById("vehicle_location").value;

  /////////////Driver details section
  const sum_driver = document.getElementById("sum_driver");
  const sum_driver_name = document.getElementById("sum_driver_name");
  const sum_driver_licence = document.getElementById("sum_driver_licence");
  const sum_driver_contact = document.getElementById("sum_driver_contact");
  const sum_driver_relation = document.getElementById("sum_driver_relation");
  const sum_owner_consent = document.getElementById("sum_owner_consent");
  const sum_use_purporse = document.getElementById("sum_use_purporse");

  var driver,
    consent = "";
  const ownerdrivingno = document.getElementById("ownerdrivingno");
  const ownerdrivingyes = document.getElementById("ownerdrivingyes");

  const vehicleconsentyes = document.getElementById("vehicleconsentyes");
  const vehicleconsentno = document.getElementById("vehicleconsentno");

  if (vehicleconsentyes.checked) {
    consent = "Yes";
  }
  if (vehicleconsentno.checked) {
    consent = "No";
  }

  if (ownerdrivingyes.checked) {
    driver = "Owner";
    sum_driver.innerHTML = driver;
    document.getElementById("sum_other_driver").style.display = "none";
  }
  if (ownerdrivingno.checked) {
    driver = "Other";
    document.getElementById("sum_other_driver").style.display = "";
    sum_driver.innerHTML = driver;
    sum_driver_name.innerHTML = document.getElementById("driver_name").value;
    sum_driver_contact.innerHTML =
      document.getElementById("driver_contact").value;
    sum_driver_licence.innerHTML =
      document.getElementById("driver_license").value;
    sum_driver_relation.innerHTML =
      document.getElementById("driver_owner_rel").value;
    sum_owner_consent.innerHTML = consent;
    sum_use_purporse.innerHTML =
      document.getElementById("purp_of_vehicle").value;
  }

  ////////////Police report section
  const sum_police_reported = document.getElementById("sum_police_reported");
  const sum_police_reported_name = document.getElementById(
    "sum_police_reported_name"
  );
  const sum_police_reported_station = document.getElementById(
    "sum_police_reported_station"
  );

  var reported;
  var form_accidentreportedno = document.getElementById("accidentreportedno");
  var form_accidentreportedyes = document.getElementById("accidentreportedyes");

  if (form_accidentreportedno.checked) {
    reported = "No";
    sum_police_reported.innerHTML = reported;
  } else if (form_accidentreportedyes.checked) {
    reported = "Yes";
    sum_police_reported.innerHTML = reported;
    sum_police_reported_name.innerHTML =
      document.getElementById("officer_name").value;
    sum_police_reported_station.innerHTML =
      document.getElementById("officer_station").value;
  }

  ////////////////Third party driver section
  tp = "";
  const tpinvolveyes = document.getElementById("tpinvolveyes");
  const tpinvolveno = document.getElementById("tpinvolveno");
  const tpinvolveunknown = document.getElementById("tpinvolveunknown");

  const sum_tpd_status = document.getElementById("sum_tpd_status");
  const sum_tpd_name = document.getElementById("sum_tpd_name");
  const sum_tpd_contact = document.getElementById("sum_tpd_contact");
  const sum_tpd_driv_lic = document.getElementById("sum_tpd_driv_lic");
  const sum_tpd_insurance_co = document.getElementById("sum_tpd_insurance_co");
  const sum_tpd_policy_id = document.getElementById("sum_tpd_policy_id");

  if (tpinvolveyes.checked) {
    tp = "Yes";
    sum_tpd_status.innerHTML = tp;
    sum_tpd_name.innerHTML = document.getElementById("tp_fullname").value;
    sum_tpd_contact.innerHTML = document.getElementById("tp_contact").value;
    sum_tpd_driv_lic.innerHTML = document.getElementById("tp_license_no").value;
    sum_tpd_insurance_co.innerHTML =
      document.getElementById("tp_insurance_co").value;
    sum_tpd_policy_id.innerHTML = document.getElementById("tp_policy_id").value;
  }
  if (tpinvolveno.checked) {
    tp = "No";
    sum_tpd_status.innerHTML = tp;
    document.querySelector(".sum_tp_details").style.display = "none";
  }
  if (tpinvolveunknown.checked) {
    tp = "Unknown";
    sum_tpd_status.innerHTML = tp;
    document.querySelector(".sum_tp_details").style.display = "none";
  }

  /////////////casualty section
}

function show_casualties(casualtyList) {
  var table = document.getElementById("sum_casualty_tbl");
  for (var i = 0; i < casualtyList.length; i++) {
    var row = table.insertRow();
    var casualtyName = row.insertCell(0);
    var casualtyContact = row.insertCell(1);
    var casualtyComments = row.insertCell(2);
    casualtyName.innerHTML = casualtyList[i].name;
    casualtyContact.innerHTML = casualtyList[i].age;
    casualtyComments.innerHTML = casualtyList[i].salary;
  }
}
