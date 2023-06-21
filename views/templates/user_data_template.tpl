<h1>Custom data</h1>
<div class="form-group row">
  <label class="col-md-3 form-control-label" for="trouserSize">
    Trouser Size
  </label>
  <select class="col-md-6 form-control form-control-select"  aria-label="trouserSize" name="trouserSize">
    {foreach $trouserSize as $size}
      <option value="{$size}">{$size}</option>
    {/foreach}
  </select>
</div>

<div class="form-group row">
  <label class="col-md-3 form-control-label" for="tshirtSize">
    T-Shirt Size
  </label>
  <select class="col-md-6 form-control form-control-select"  aria-label="tshirtSize" name="tshirtSize">
    {foreach $tshirtSize as $size}
      <option value="{$size}">{$size}</option>
    {/foreach}
  </select>
</div>


<div class="form-group row">
  <label class="col-md-3 form-control-label" for="shoesize">
    Shoe size
  </label>
  <input type="text" placeholder="Shoe Size" class="col-md-6 form-control js-child-focus" name="shoesize">
</div>