<div class="row witness" id="witness_<?= $count?>">
    <div class="col-lg-12">
        <h6 class="title">
        <span class="count"></span> Witness Info:
        <div class="float-right"><i class="fa fa-times-circle item-remove" onclick="removeItem('witness_<?= $count?>', 'witness')" title="Remove from list"></i></div>
        </h6>
    </div>
     <div class="form-group col-lg-6 col-md-6">
        <input type="text" required name="witness[<?= $count?>][name]" class="form-control witness_name" placeholder="Name *" value="" />
    </div>
    <div class="form-group col-lg-6 col-md-6">
        <input type="text" required name="witness[<?= $count?>][contact]" class="form-control witness_contact" placeholder="Contact *" value="" />
    </div>
</div>