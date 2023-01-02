<script>
  // Wait for the DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize FilePond on the file input element with custom options
    FilePond.create(
      document.querySelector('#drivers_licence_front'),
      {
        labelIdle: `<div style="font-size:80%;" title="Picture of the front of drivers licence back with clear details">Drivers Licence Front  (required) <br/><div class="filepond--label-action">Browse</div></div>`,
        minFileSize: "16kb",
        maxFileSize: "3MB",
        imagePreviewHeight: 130,
        imagePreviewWidth: 130,
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom"
      }
    );
  });
</script>

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="filepond--root file-upload filepond--hopper" id="drivers_licence_front"
    data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom"
    data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom"
    data-style-button-remove-item-align="false">
    <input class="filepond--browser" type="file" id="filepond--browser-1pa5qltny" name="upload[drivers_licence_front]"
      aria-controls="filepond--assistant-1pa5qltny" aria-labelledby="filepond--drop-label-1pa5qltny"
      accept="image/png,image/jpeg,image/gif,application/pdf" required />
    <div style="height: 100%"></div>
    <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1">
      <label for="filepond--browser-1pa5qltny" id="filepond--drop-label-1pa5qltny" aria-hidden="true">
        <div style="font-size: 80%" title="Front view of drivers licence with clear details">
          Drivers Licence Front (required) <br />
          <div class="filepond--label-action" tabindex="0">
            Browse
          </div>
        </div>
      </label>
    </div>
    <div class="filepond--list-scroller">
      <ul class="filepond--list" role="list"></ul>
    </div>
    <div class="filepond--panel filepond--panel-root" data-scalable="true">
      <div class="filepond--panel-top filepond--panel-root"></div>
      <div class="filepond--panel-center filepond--panel-root"></div>
      <div class="filepond--panel-bottom filepond--panel-root"></div>
    </div>
    <span class="filepond--assistant" id="filepond--assistant-1pa5qltny" role="status" aria-live="polite"
      aria-relevant="additions"></span>
    <div class="filepond--drip"></div>
    <fieldset class="filepond--data"></fieldset>
  </div>
</div>
<script>
  // Wait for the DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize FilePond on the file input element with custom options
    FilePond.create(
      document.querySelector('#drivers_licence_rear'),
      {
        labelIdle: `<div style="font-size:80%;" title="Picture of the back of drivers licence back with clear details">Drivers Licence Rear (required) <br/><div class="filepond--label-action">Browse</div></div>`,
        minFileSize: "16kb",
        maxFileSize: "3MB",
        imagePreviewHeight: 130,
        imagePreviewWidth: 130,
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom"
      }
    );
  });
</script>

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="filepond--root file-upload filepond--hopper" id="drivers_licence_rear"
    data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom"
    data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom"
    data-style-button-remove-item-align="false">
    <input class="filepond--browser" type="file" id="filepond--browser-4us51lbn3" name="upload[drivers_licence_rear]"
      aria-controls="filepond--assistant-4us51lbn3" aria-labelledby="filepond--drop-label-4us51lbn3"
      accept="image/png,image/jpeg,image/gif,application/pdf" required />
    <div style="height: 100%"></div>
    <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1">
      <label for="filepond--browser-4us51lbn3" id="filepond--drop-label-4us51lbn3" aria-hidden="true">
        <div style="font-size: 80%" title="Rear view of drivers licence with clear details">
          Drivers Licence Rear (required) <br />
          <div class="filepond--label-action" tabindex="0">
            Browse
          </div>
        </div>
      </label>
    </div>
    <div class="filepond--list-scroller">
      <ul class="filepond--list" role="list"></ul>
    </div>
    <div class="filepond--panel filepond--panel-root" data-scalable="true">
      <div class="filepond--panel-top filepond--panel-root"></div>
      <div class="filepond--panel-center filepond--panel-root"></div>
      <div class="filepond--panel-bottom filepond--panel-root"></div>
    </div>
    <span class="filepond--assistant" id="filepond--assistant-4us51lbn3" role="status" aria-live="polite"
      aria-relevant="additions"></span>
    <div class="filepond--drip"></div>
    <fieldset class="filepond--data"></fieldset>
  </div>
</div>
<script>
  // Wait for the DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize FilePond on the file input element with custom options
    FilePond.create(
      document.querySelector('#damaged_vehicle_pictures'),
      {
        labelIdle: `<div style="font-size:80%;" title="Pictures of damaged vehicle">Damaged Vehicle Pictures (required) <br/><div class="filepond--label-action">Browse</div></div>`,
        minFileSize: "16kb",
        maxFileSize: "3MB",
        imagePreviewHeight: 130,
        imagePreviewWidth: 130,
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom"
      }
    );
  });
</script>

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="filepond--root file-upload filepond--hopper" id="damaged_vehicle_pictures"
    data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom"
    data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom"
    data-style-button-remove-item-align="false">
    <input class="filepond--browser" type="file" id="filepond--browser-xemj2bv9r"
      name="upload[damaged_vehicle_pictures][]" aria-controls="filepond--assistant-xemj2bv9r"
      aria-labelledby="filepond--drop-label-xemj2bv9r" accept="image/png,image/jpeg,image/gif,application/pdf"
      multiple="" required />
    <div style="height: 100%"></div>
    <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1">
      <label for="filepond--browser-xemj2bv9r" id="filepond--drop-label-xemj2bv9r" aria-hidden="true">
        <div style="font-size: 80%" title="Pictures of damaged vehicle">
          Damaged Vehicle Pictures (required) <br />
          <div class="filepond--label-action" tabindex="0">
            Browse
          </div>
        </div>
      </label>
    </div>
    <div class="filepond--list-scroller">
      <ul class="filepond--list" role="list"></ul>
    </div>
    <div class="filepond--panel filepond--panel-root" data-scalable="true">
      <div class="filepond--panel-top filepond--panel-root"></div>
      <div class="filepond--panel-center filepond--panel-root"></div>
      <div class="filepond--panel-bottom filepond--panel-root"></div>
    </div>
    <span class="filepond--assistant" id="filepond--assistant-xemj2bv9r" role="status" aria-live="polite"
      aria-relevant="additions"></span>
    <div class="filepond--drip"></div>
    <fieldset class="filepond--data"></fieldset>
  </div>
</div>
<script>
  // Wait for the DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the element with the "estimates_of_repair" id
    const element = document.getElementById('estimates_of_repair');

    // Initialize FilePond on the element with the specified options
    FilePond.create(element, {
      labelIdle: `<div style="font-size:80%;" title="Total estimates of repair">Estimates Of Repair (required) <br/><div class="filepond--label-action">Browse</div></div>`,
      minFileSize: "16kb",
      maxFileSize: "16MB",
      imagePreviewHeight: 130,
      styleLoadIndicatorPosition: "center bottom",
      styleProgressIndicatorPosition: "right bottom",
      styleButtonRemoveItemPosition: "left bottom",
      styleButtonProcessItemPosition: "right bottom"
    });
  });
</script>

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="filepond--root file-upload filepond--hopper" id="estimates_of_repair"
    data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom"
    data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom"
    data-style-button-remove-item-align="false">
    <input class="filepond--browser" type="file" id="filepond--browser-6nih2tnc5" name="upload[estimates_of_repair][]"
      aria-controls="filepond--assistant-6nih2tnc5" aria-labelledby="filepond--drop-label-6nih2tnc5"
      accept="image/png,image/jpeg,image/gif,application/pdf" multiple="" required />
    <div style="height: 100%"></div>
    <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1">
      <label for="filepond--browser-6nih2tnc5" id="filepond--drop-label-6nih2tnc5" aria-hidden="true">
        <div style="font-size: 80%" title="Total estimates of repair">
          Estimates Of Repair (required) <br />
          <div class="filepond--label-action" tabindex="0">
            Browse
          </div>
        </div>
      </label>
    </div>
    <div class="filepond--list-scroller">
      <ul class="filepond--list" role="list"></ul>
    </div>
    <div class="filepond--panel filepond--panel-root" data-scalable="true">
      <div class="filepond--panel-top filepond--panel-root"></div>
      <div class="filepond--panel-center filepond--panel-root"></div>
      <div class="filepond--panel-bottom filepond--panel-root"></div>
    </div>
    <span class="filepond--assistant" id="filepond--assistant-6nih2tnc5" role="status" aria-live="polite"
      aria-relevant="additions"></span>
    <div class="filepond--drip"></div>
    <fieldset class="filepond--data"></fieldset>
  </div>
</div>
<script>
  // Wait for the DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the element with the "estimates_of_repair" id
    const element = document.getElementById('police_report');

    // Initialize FilePond on the element with the specified options
    FilePond.create(element, {
      labelIdle: `<div style="font-size:80%;" title="Police report">Police Report (optional) <br/><div class="filepond--label-action">Browse</div></div>`,
      minFileSize: "16kb",
      maxFileSize: "3MB",
      imagePreviewHeight: 130,
      styleLoadIndicatorPosition: "center bottom",
      styleProgressIndicatorPosition: "right bottom",
      styleButtonRemoveItemPosition: "left bottom",
      styleButtonProcessItemPosition: "right bottom"
    });
  });
</script>

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="filepond--root file-upload filepond--hopper" id="police_report"
    data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom"
    data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom"
    data-style-button-remove-item-align="false">
    <input class="filepond--browser" type="file" id="filepond--browser-fe71tk4xc" name="upload[police_report][]"
      aria-controls="filepond--assistant-fe71tk4xc" aria-labelledby="filepond--drop-label-fe71tk4xc"
      accept="image/png,image/jpeg,image/gif,application/pdf" multiple="" />
    <div style="height: 100%"></div>
    <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1">
      <label for="filepond--browser-fe71tk4xc" id="filepond--drop-label-fe71tk4xc" aria-hidden="true">
        <div style="font-size: 80%" title="Police report">
          Police Report (optional) <br />
          <div class="filepond--label-action" tabindex="0">
            Browse
          </div>
        </div>
      </label>
    </div>
    <div class="filepond--list-scroller">
      <ul class="filepond--list" role="list"></ul>
    </div>
    <div class="filepond--panel filepond--panel-root" data-scalable="true">
      <div class="filepond--panel-top filepond--panel-root"></div>
      <div class="filepond--panel-center filepond--panel-root"></div>
      <div class="filepond--panel-bottom filepond--panel-root"></div>
    </div>
    <span class="filepond--assistant" id="filepond--assistant-fe71tk4xc" role="status" aria-live="polite"
      aria-relevant="additions"></span>
    <div class="filepond--drip"></div>
    <fieldset class="filepond--data"></fieldset>
  </div>
</div>
<script>
  // Wait for the DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the element with the "estimates_of_repair" id
    const element = document.getElementById('medical_reports');

    // Initialize FilePond on the element with the specified options
    FilePond.create(element, {
      labelIdle: `<div style="font-size:80%;" title="Medical reports">Medical Reports (optional) <br/><div class="filepond--label-action">Browse</div></div>`,
      minFileSize: "16kb",
      maxFileSize: "3MB",
      imagePreviewHeight: 130,
      styleLoadIndicatorPosition: "center bottom",
      styleProgressIndicatorPosition: "right bottom",
      styleButtonRemoveItemPosition: "left bottom",
      styleButtonProcessItemPosition: "right bottom"
    });
  });
</script>

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="filepond--root file-upload filepond--hopper" id="medical_reports"
    data-style-button-remove-item-position="left bottom" data-style-button-process-item-position="right bottom"
    data-style-load-indicator-position="center bottom" data-style-progress-indicator-position="right bottom"
    data-style-button-remove-item-align="false">
    <input class="filepond--browser" type="file" id="filepond--browser-7fe359p2l" name="upload[medical_reports][]"
      aria-controls="filepond--assistant-7fe359p2l" aria-labelledby="filepond--drop-label-7fe359p2l"
      accept="image/png,image/jpeg,image/gif,application/pdf" multiple="" />
    <div style="height: 100%"></div>
    <div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1">
      <label for="filepond--browser-7fe359p2l" id="filepond--drop-label-7fe359p2l" aria-hidden="true">
        <div style="font-size: 80%" title="Medical reports">
          Medical Reports (optional) <br />
          <div class="filepond--label-action" tabindex="0">
            Browse
          </div>
        </div>
      </label>
    </div>
    <div class="filepond--list-scroller">
      <ul class="filepond--list" role="list"></ul>
    </div>
    <div class="filepond--panel filepond--panel-root" data-scalable="true">
      <div class="filepond--panel-top filepond--panel-root"></div>
      <div class="filepond--panel-center filepond--panel-root"></div>
      <div class="filepond--panel-bottom filepond--panel-root"></div>
    </div>
    <span class="filepond--assistant" id="filepond--assistant-7fe359p2l" role="status" aria-live="polite"
      aria-relevant="additions"></span>
    <div class="filepond--drip"></div>
    <fieldset class="filepond--data"></fieldset>
  </div>
</div>