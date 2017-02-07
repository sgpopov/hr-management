<form action="{{ isset($role->id) ? route('roles.update', $role->id) : route('roles.store') }}" method="POST" enctype="multipart/form-data">
    @if (isset($role->id))
        <input type="hidden" name="_method" value="PATCH">
    @endif
    {{ csrf_field() }}

    <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="name" class="col-sm-3 form-control-label">Name</label>
        </div>
        <div class="col-sm-5">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required
                   value="{{ old('name', $role->name ?? null) }}" />
            @if ($errors->has('name'))
                <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('description') ? 'has-danger' : '' }}">
        <div class="col-md-2">
            <label for="description" class="col-sm-3 form-control-label">Description</label>
        </div>
        <div class="col-sm-5">
            <textarea name="description" id="description"  class="form-control" placeholder="Description">{{ old('description', $role->description ?? null) }}</textarea>
            @if ($errors->has('description'))
                <small class="text-help">{{ $errors->first('description') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row {{ $errors->has('route_id') ? 'has-danger' : '' }}">
        <div class="col-md-12">
            <label for="role_id" class="col-sm-3 form-control-label">Select the routes to which access will be granted</label>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('route_id') ? 'has-danger' : '' }}">
        <div class="col-sm-12">
            <ul class="list-group list-group-fit">
                @foreach($routes as $route)
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <input type="checkbox" name="route_id[]" id="route_{{ $route->id }}" value="{{ $route->id }}"
                                       @if (is_array(old('route_id')) && in_array($route->id, old('route_id')))
                                         checked
                                       @elseif (isset($role->id) && count($role->routes->where('id', $route->id)) > 0)
                                         checked
                                       @endif
                                />
                            </div>

                            <div class="media-body media-middle">
                                <label for="route_{{ $route->id }}" class="m-b-0" role="button">
                                    <span class="{{ httpMethodColor($route->methods) }}">
                                        {{ $route->methods }}
                                    </span>
                                    /{{ $route->uri }}
                                </label>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            @if ($errors->has('route_id'))
                <small class="text-help">{{ $errors->first('route_id') }}</small>
            @endif
        </div>
    </div>

    <div class="form-group row m-b-0">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">{{ isset($role->id) ? 'Update' : 'Submit' }}</button>
        </div>
    </div>
</form>
