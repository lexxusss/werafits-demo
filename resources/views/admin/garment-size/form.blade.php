<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($garmentsize->name) ? $garmentsize->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_zpac') ? 'has-error' : ''}}">
    <label for="s3_url_zpac" class="control-label">{{ 'S3 Url Zpac' }}</label>
    <textarea class="form-control" rows="5" name="s3_url_zpac" type="textarea" id="s3_url_zpac" required>{{ isset($garmentsize->s3_url_zpac) ? $garmentsize->s3_url_zpac : ''}}</textarea>
    {!! $errors->first('s3_url_zpac', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('garment_name_id') ? 'has-error' : ''}}">
    <label for="garment_name_id" class="control-label">{{ 'Garment Name Id' }}</label>
    <input class="form-control" name="garment_name_id" type="number" id="garment_name_id" value="{{ isset($garmentsize->garment_name_id) ? $garmentsize->garment_name_id : ''}}" >
    {!! $errors->first('garment_name_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
