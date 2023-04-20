
<div class="form-group {{ $errors->has('isOn') ? 'has-error' : '' }}">
    <label for="isOn" class="col-md-2 control-label">Is On</label>
    <div class="col-md-10">
        <select class="form-control" name="isOn" type="text" id="isOn" >
            <option value="SI" {{ (old('isOn', optional($setting)->isOn) == 'SI')?'selected':'' }}>SI</option>
            <option value="NO" {{ (old('isOn', optional($setting)->isOn) == 'NO')?'selected':'' }}>NO</option>
        </select>
        {!! $errors->first('isOn', '<p class="help-block">:message</p>') !!}
    </div>
</div>

