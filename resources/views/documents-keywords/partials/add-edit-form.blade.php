<form action="{{ isset($keyword->id) ? route('documentsKeywords.update', $keyword->id) : route('documentsKeywords.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-block">
            <div class="row m-b-1">
                <div class="col-md-12">
                    <div class="form-group m-b-1 {{ $errors->has('keyword') ? 'has-danger' : '' }}">
                        <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword" required
                                   value="{{ old('keyword', $keyword->keyword ?? null) }}"/>
                            @if ($errors->has('keyword'))
                                <small class="text-help">{{ $errors->first('keyword') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-b-1">
                <div class="col-md-12">
                    <div class="form-group m-b-1 {{ $errors->has('description') ? 'has-danger' : '' }}">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" placeholder="Short description" required
                                   value="{{ old('description', $keyword->description ?? null) }}"/>
                            @if ($errors->has('description'))
                                <small class="text-help">{{ $errors->first('description') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-b-1">
                <div class="col-md-12">
                    <div class="form-group m-b-1 {{ $errors->has('type') ? 'has-danger' : '' }}">
                        <label for="type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select name="type" id="type" class="c-select" required>
                                <option value="">Please chose</option>
                                <option value="autoId">Auto ID</option>
                                <option value="blank">Blank field</option>
                                <option value="currentDate">Current date</option>
                                <option value="custom">Custom value</option>
                                <option value="employeeInfo">Employee information</option>
                                <option value="lastUsed">Last used value</option>
                            </select>
                            @if ($errors->has('type'))
                                <small class="text-help">{{ $errors->first('type') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-b-1 js-">
                <div class="col-md-12">
                    <div class="form-group m-b-1 {{ $errors->has('default_value') ? 'has-danger' : '' }}">
                        <label for="default_value" class="col-sm-2 control-label">Default value</label>
                        <div class="col-sm-10">
                            <input type="text" name="default_value" id="default_value" class="form-control" placeholder="Default value"
                                   value="{{ old('default_value', $keyword->default_value ?? null) }}"/>
                            @if ($errors->has('default_value'))
                                <small class="text-help">{{ $errors->first('default_value') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row m-b-0">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">{{ isset($keyword->id) ? 'Update' : 'Submit' }}</button>
        </div>
    </div>

    {{ csrf_field() }}

    @if (isset($keyword->id))
        <input type="hidden" name="_method" value="PATCH">
    @endif
</form>
