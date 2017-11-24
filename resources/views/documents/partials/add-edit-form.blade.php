<form action="{{ isset($document->id) ? route('documents.update', $document->id) : route('documents.store') }}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" required value="{{ old('title', $document->title ?? null) }}" />

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="employee_id">Employee</label>

        <div class="row">
            <div class="col-md-3">
                <select name="employee_id" id="employee_id" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                    <option value=""></option>
                    @foreach($employees as $employee) :
                        <option value="">{{ $employee->fullname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if ($errors->has('employee_id'))
            <div class="invalid-feedback">
                {{ $errors->first('employee_id') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="content">Content</label>

        @if ($errors->has('content'))
            <div class="invalid-feedback d-flex d-lg-flex mb-3">
                {{ $errors->first('content') }}
            </div>
        @endif

        <ckeditor id="content"
                  name="content"
                  :value="{{ json_encode(old('content', $document->content ?? null)) }}">
        </ckeditor>
    </div>

    {{ csrf_field() }}

    @if (isset($document->id))
        <input type="hidden" name="_method" value="PATCH" />
    @endif

    <button type="submit" class="btn btn-primary">
        {{ isset($document->id) ? 'Update' : 'Submit' }}
    </button>
</form>
