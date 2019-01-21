<div class="form-group {{ $errors->has('garment_size_id') ? 'has-error' : ''}}">
    <label for="garment_size_id" class="control-label">{{ 'Garment Size Id' }}</label>
    <input class="form-control" name="garment_size_id" type="number" id="garment_size_id" value="{{ isset($symulation->garment_size_id) ? $symulation->garment_size_id : ''}}" >
    {!! $errors->first('garment_size_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('avatar_id') ? 'has-error' : ''}}">
    <label for="avatar_id" class="control-label">{{ 'Avatar Id' }}</label>
    <input class="form-control" name="avatar_id" type="number" id="avatar_id" value="{{ isset($symulation->avatar_id) ? $symulation->avatar_id : ''}}" >
    {!! $errors->first('avatar_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_garment_json') ? 'has-error' : ''}}">
    <label for="s3_url_garment_json" class="control-label">{{ 'S3 Url Garment Json' }}</label>
    <input class="form-control" name="s3_url_garment_json" type="text" id="s3_url_garment_json" value="{{ isset($symulation->s3_url_garment_json) ? $symulation->s3_url_garment_json : ''}}" required>
    {!! $errors->first('s3_url_garment_json', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_garment_preview_json') ? 'has-error' : ''}}">
    <label for="s3_url_garment_preview_json" class="control-label">{{ 'S3 Url Garment Preview Json' }}</label>
    <input class="form-control" name="s3_url_garment_preview_json" type="text" id="s3_url_garment_preview_json" value="{{ isset($symulation->s3_url_garment_preview_json) ? $symulation->s3_url_garment_preview_json : ''}}" required>
    {!! $errors->first('s3_url_garment_preview_json', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_garment_usdz') ? 'has-error' : ''}}">
    <label for="s3_url_garment_usdz" class="control-label">{{ 'S3 Url Garment Usdz' }}</label>
    <input class="form-control" name="s3_url_garment_usdz" type="text" id="s3_url_garment_usdz" value="{{ isset($symulation->s3_url_garment_usdz) ? $symulation->s3_url_garment_usdz : ''}}" required>
    {!! $errors->first('s3_url_garment_usdz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('s3_url_garment_metadata_json') ? 'has-error' : ''}}">
    <label for="s3_url_garment_metadata_json" class="control-label">{{ 'S3 Url Garment Metadata Json' }}</label>
    <input class="form-control" name="s3_url_garment_metadata_json" type="text" id="s3_url_garment_metadata_json" value="{{ isset($symulation->s3_url_garment_metadata_json) ? $symulation->s3_url_garment_metadata_json : ''}}" required>
    {!! $errors->first('s3_url_garment_metadata_json', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
