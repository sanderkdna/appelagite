
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($message)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('topic') ? 'has-error' : '' }}">
    <label for="topic" class="col-md-2 control-label">Topic</label>
    <div class="col-md-10">
        <input class="form-control" name="topic" type="text" id="topic" value="{{ old('topic', optional($message)->topic) }}" minlength="1" placeholder="Enter topic here...">
        {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
    <label for="user" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <input class="form-control" name="user" type="text" id="user" value="{{ old('user', optional($message)->user) }}" minlength="1" placeholder="Enter user here...">
        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-2 control-label">Message</label>
    <div class="col-md-10">
        <input class="form-control" name="message" type="number" id="message" value="{{ old('message', optional($message)->message) }}" placeholder="Enter message here...">
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>

