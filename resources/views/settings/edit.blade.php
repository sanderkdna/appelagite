@extends('../layout/' . $layout)

@section('subhead')
    <title>Accordion - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Setting' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('settings.setting.index') }}" class="btn btn-primary" title="Show All Setting">
                    <i data-lucide="list" class="block mx-auto"></i>
                </a>
            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('settings.setting.update', $setting->id) }}" id="edit_setting_form" name="edit_setting_form" accept-charset="UTF-8" class="form-horizontal" style="margin-top:30px">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('settings.form', [
                                        'setting' => $setting,
                                      ])

                <div class="form-group" style="margin-top:30px">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
