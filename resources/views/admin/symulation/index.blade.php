@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Symulation</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/symulation/create') }}" class="btn btn-success btn-sm" title="Add New Symulation">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/symulation') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Garment Size Id</th><th>Avatar Id</th><th>S3 Url Garment Json</th><th>S3 Url Garment Preview Json</th><th>S3 Url Garment Usdz</th><th>S3 Url Garment Metadata Json</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($symulation as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->garment_size_id }}</td><td>{{ $item->avatar_id }}</td><td>{{ $item->s3_url_garment_json }}</td><td>{{ $item->s3_url_garment_preview_json }}</td><td>{{ $item->s3_url_garment_usdz }}</td><td>{{ $item->s3_url_garment_metadata_json }}</td>
                                        <td>
                                            <a href="{{ url('/admin/symulation/' . $item->id) }}" title="View Symulation"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/symulation/' . $item->id . '/edit') }}" title="Edit Symulation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/symulation' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Symulation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $symulation->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
