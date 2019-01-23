<div class="form-group {{ $errors->has('hash') ? 'has-error' : ''}}">
    <label for="hash" class="control-label">{{ 'Hash' }}</label>
    <input class="form-control" name="hash" type="text" id="hash" value="{{ isset($avatar->hash) ? $avatar->hash : ''}}" >
    {!! $errors->first('hash', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('prop') ? 'has-error' : ''}}">
    <label for="prop" class="control-label">{{ 'Prop' }}</label>
    <input class="form-control" name="prop" type="text" id="prop" value="{{ isset($avatar->prop) ? $avatar->prop : ''}}" >
    {!! $errors->first('prop', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_abc') ? 'has-error' : ''}}">
    <label for="s3_url_abc" class="control-label">{{ 'S3 Url Abc' }}</label>
    <input class="form-control" name="s3_url_abc" type="text" id="s3_url_abc" value="{{ isset($avatar->s3_url_abc) ? $avatar->s3_url_abc : ''}}" >
    {!! $errors->first('s3_url_abc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_glb') ? 'has-error' : ''}}">
    <label for="s3_url_glb" class="control-label">{{ 'S3 Url Glb' }}</label>
    <input class="form-control" name="s3_url_glb" type="text" id="s3_url_glb" value="{{ isset($avatar->s3_url_glb) ? $avatar->s3_url_glb : ''}}" >
    {!! $errors->first('s3_url_glb', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_obj') ? 'has-error' : ''}}">
    <label for="s3_url_obj" class="control-label">{{ 'S3 Url Obj' }}</label>
    <input class="form-control" name="s3_url_obj" type="text" id="s3_url_obj" value="{{ isset($avatar->s3_url_obj) ? $avatar->s3_url_obj : ''}}" >
    {!! $errors->first('s3_url_obj', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
