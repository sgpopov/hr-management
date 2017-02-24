<form action="{{ isset($template->id) ? route('documentTemplates.update', $template->id) : route('documentTemplates.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-block">
            <div class="form-group row {{ $errors->has('title') ? 'has-danger' : '' }}">
                <div class="col-md-12">
                    <label for="title" class="form-control-label m-b-1">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required
                           value="{{ old('title', $template->title ?? null) }}" />
                    @if ($errors->has('title'))
                        <small class="text-help">{{ $errors->first('title') }}</small>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ $errors->has('title') ? 'has-danger' : '' }}">
                <div class="col-md-2">
                    <label for="content" class="form-control-label">Content</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ckeditor id="content"
                              name="content"
                              :value="{{ json_encode(old('content', $template->content ?? null)) }}">
                    </ckeditor>

                    @if ($errors->has('content'))
                        <small class="text-help">{{ $errors->first('content') }}</small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row m-b-0">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">{{ isset($template->id) ? 'Update' : 'Submit' }}</button>
        </div>
    </div>

    {{ csrf_field() }}

    @if (isset($template->id))
        <input type="hidden" name="_method" value="PATCH">
    @endif
</form>
