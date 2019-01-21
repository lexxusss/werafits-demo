@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Symulation {{ $symulation->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/symulation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/symulation/' . $symulation->id . '/edit') }}" title="Edit Symulation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/symulation' . '/' . $symulation->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Symulation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $symulation->id }}</td>
                                    </tr>
                                    <tr><th> Garment Size Id </th><td> {{ $symulation->garment_size_id }} </td></tr><tr><th> Avatar Id </th><td> {{ $symulation->avatar_id }} </td></tr><tr><th> S3 Url Garment Json </th><td> {{ $symulation->s3_url_garment_json }} </td></tr><tr><th> S3 Url Garment Preview Json </th><td> {{ $symulation->s3_url_garment_preview_json }} </td></tr><tr><th> S3 Url Garment Usdz </th><td> {{ $symulation->s3_url_garment_usdz }} </td></tr><tr><th> S3 Url Garment Metadata Json </th><td> {{ $symulation->s3_url_garment_metadata_json }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
