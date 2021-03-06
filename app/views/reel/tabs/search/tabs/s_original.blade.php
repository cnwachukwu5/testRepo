<div class="container marginleft">
  <div class="col-lg-3">
    <h3>S Reels to consider</h3>
    <div id='s-checkboxes' class="marginleft">
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="none" checked>None</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="any">Any</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="14">S14</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="16">S16</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="18">S18</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="21">S21</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="24">S24</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="28">S28</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label><input type="checkbox" name="s-checkboxes[]" value="32">S32</label>
        </div>
      </div>
    </div>
  </div>
  <div id='s-inputs' class="col-lg-4">
    <h3>S Reel Model Parameters</h3>
    <div class="marginleft">
      <div class="form-group">
        <label class="col-md-5 control-label">Spring Size</label>
        <div class="col-sm-4">
          <select name="s-springsize" class="form-control">
            <option value="all">All</option>
            <option value="351">351</option>
            <option value="601">601</option>
            <option value="621">621</option>
            <option value="622">622</option>
            <option value="623">623</option>
            <option value="624">624</option>
            <option value="62X">62X</option>
            <option value="751">751</option>
            <option value="752">752</option>
            <option value="753">753</option>
            <option value="754">754</option>
            <option value="75X">75X</option>
            <option value="801">801</option>
            <option value="802">802</option>
            <option value="803">803</option>
            <option value="804">804</option>
            <option value="80X">80X</option>
            <option value="1001">1001</option>
            <option value="1002">1002</option>
            <option value="1003">1003</option>
            <option value="1004">1004</option>
            <option value="100X">100X</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-5 control-label">Collector Code</label>
        <div class="col-sm-3">
          <div class="input-group"><input type="text" name="s-collectorcode" id="s-collectorcode" class="form-control" value="63" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-5 control-label">Drum Diameter Range Min.</label>
        <div class="col-md-3">
          <div class="input-group">
            <input type="text" name="s-drummin" class="form-control" value="8" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-5 control-label">Drum Diameter Range Max.</label>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" name="s-drummax" class="form-control" value="28" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-5 control-label">Gear Ratio</label>
        <div class="col-sm-5">
          <select class="form-control" name="s-gearratio">
            <option value="all" class="active">All</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-5 control-label">Pretension Turn Range Min.</label>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" name="s-pretensmin" class="form-control" value="1" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-5 control-label">Pretension Turn Range Max.</label>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" name="s-pretensmax" class="form-control" value="6"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$("#s-inputs select[name='s-springsize']").change(function() {
  showValidGearS();
});

$('#s-checkboxes :checkbox').change(function() {
  drumMax = $("#s-inputs input[name='s-drummax']");
  if(this.value == 'none' || this.value == 'any') {
    var value = this.value;

    drumMax.val(28);

    $('#s-checkboxes :checkbox').each(function() {
      if(value != this.value) {
        $(this).attr('checked', false);

      }
    });
  }
  else {
    var highest = null;
    $('#s-checkboxes :checkbox').each(function() {
      if(this.checked) {
        highest = this;
      }
    });

    $("#s-checkboxes :checkbox[value='any']").attr('checked', false);
    $("#s-checkboxes :checkbox[value='none']").attr('checked', false);


    if(highest == null) {
      drumMax.val('');
    }
    else {
      switch(highest.value) {
        case 's14':
          drumMax.val(10);
          break;
        case 's16':
          drumMax.val(12);
          break;
        case 's18':
          drumMax.val(14);
          break;
        case 's21':
          drumMax.val(17);
          break;
        case 's24':
          drumMax.val(20);
          break;
        case 's28':
          drumMax.val(24);
          break;
        case 's32':
        default:
          drumMax.val(28);
          break;

      }
    }
  }
  console.log("about to get valid spring");
  getValidSpringS(this.value);
  showValidGearS();
});
</script>
