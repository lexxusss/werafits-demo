<div class="form-group {{ $errors->has('hash') ? 'has-error' : ''}}">
    <label for="hash" class="control-label">{{ 'Hash' }}</label>
    <input class="form-control" name="hash" type="text" id="hash" value="{{ isset($avatar->hash) ? $avatar->hash : ''}}" >
    {!! $errors->first('hash', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_abc') ? 'has-error' : ''}}">
    <label for="s3_url_abc" class="control-label">{{ 'S3 Url Abc' }}</label>
    <textarea class="form-control" rows="5" name="s3_url_abc" type="textarea" id="s3_url_abc" required>{{ isset($avatar->s3_url_abc) ? $avatar->s3_url_abc : ''}}</textarea>
    {!! $errors->first('s3_url_abc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_glb') ? 'has-error' : ''}}">
    <label for="s3_url_glb" class="control-label">{{ 'S3 Url Glb' }}</label>
    <textarea class="form-control" rows="5" name="s3_url_glb" type="textarea" id="s3_url_glb" required>{{ isset($avatar->s3_url_glb) ? $avatar->s3_url_glb : ''}}</textarea>
    {!! $errors->first('s3_url_glb', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_obj') ? 'has-error' : ''}}">
    <label for="s3_url_obj" class="control-label">{{ 'S3 Url Obj' }}</label>
    <textarea class="form-control" rows="5" name="s3_url_obj" type="textarea" id="s3_url_obj" required>{{ isset($avatar->s3_url_obj) ? $avatar->s3_url_obj : ''}}</textarea>
    {!! $errors->first('s3_url_obj', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
