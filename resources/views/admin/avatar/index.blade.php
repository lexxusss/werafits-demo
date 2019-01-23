@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Avatar</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/avatar/create') }}" class="btn btn-success btn-sm" title="Add New Avatar">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <a href="javascript:void(0);" class="refresh_avatars btn btn-primary btn-sm" title="Refresh Avatars from Wearfits API">
                            <i class="fa fa-plus" aria-hidden="true"></i> Refresh Avatars from Wearfits API
                        </a>
                        <p class="help-block refresh_avatars_response"></p>

                        <form method="GET" action="{{ url('/admin/avatar') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Hash</th><th>Prop</th><th>S3 Url Abc</th><th>S3 Url Glb</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($avatar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->hash }}</td><td>{{ $item->prop }}</td><td>{{ $item->s3_url_abc }}</td><td>{{ $item->s3_url_glb }}</td>
                                        <td>
                                            <a href="{{ url('/admin/avatar/' . $item->id) }}" title="View Avatar"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/avatar/' . $item->id . '/edit') }}" title="Edit Avatar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/avatar' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Avatar" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $avatar->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <script>
        $('.refresh_avatars').click(function () {
            $.post('{{ route("refresh_avatars") }}', {debug: 123}, function (result) {
                console.log(result);
                $('.refresh_avatars_response').text(result);
            });
        });
    </script>
@endsection
