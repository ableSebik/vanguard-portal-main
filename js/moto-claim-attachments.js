//////////////////////filePond inputs for uploads
//Initialize FilePond on the file input element with custom options
var drivers_licence_front = FilePond.create(
  document.querySelector("#drivers_licence_front"),
  {
    labelIdle:
      '<span style="font-size:14px">Driver licence top <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "right top",
    server: {
      url: "uploads",
    },
  }
);
var drivers_licence_rear = FilePond.create(
  document.querySelector("#drivers_licence_rear"),
  {
    labelIdle:
      '<span style="font-size:14px">Driver licence rear <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "right top",
    server: {
      url: "uploads",
    },
  }
);
var damaged_vehicle_pictures = FilePond.create(
  document.querySelector("#damaged_vehicle_pictures"),
  {
    labelIdle:
      '<span style="font-size:14px">Picture of damaged vehicle <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    allowMultiple: true,
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "right top",
    server: {
      url: "uploads",
    },
  }
);
var estimates_of_repair = FilePond.create(
  document.querySelector("#estimates_of_repair"),
  {
    labelIdle:
      '<span style="font-size:14px">Estimates of repair <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "right top",
    server: {
      url: "uploads",
    },
  }
);
var medical_reports = FilePond.create(
  document.querySelector("#medical_reports"),
  {
    labelIdle:
      '<span style="font-size:14px">Medical reports <br>(if any)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "right top",
    server: {
      url: "uploads",
    },
  }
);
var police_report = FilePond.create(document.querySelector("#police_report"), {
  labelIdle: '<span style="font-size:14px">Police report <br>(if any)</span>',
  acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
  minFileSize: "16kb",
  maxFileSize: "3MB",
  imagePreviewHeight: 130,
  imagePreviewWidth: 130,
  styleButtonRemoveItemPosition: "right top",
  server: {
    url: "uploads",
  },
});

////////////////////
