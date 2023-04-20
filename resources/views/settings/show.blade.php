@extends('../layout/' . $layout)

@section('subhead')
    <title>Accordion - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Setting' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('settings.setting.destroy', $setting->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('settings.setting.index') }}" class="btn btn-primary" title="Show All Setting">
                        <i data-lucide="list" class="block mx-auto"></i>
                    </a>

                    <a href="{{ route('settings.setting.create') }}" class="btn btn-success" title="Create New Setting">
                        <i data-lucide="plus" class="block mx-auto"></i>
                    </a>
                    
                    <a href="{{ route('settings.setting.edit', $setting->id ) }}" class="btn btn-primary" title="Edit Setting">
                        <i data-lucide="edit" class="block mx-auto"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Setting" onclick="return confirm(&quot;Click Ok to delete Setting.?&quot;)">
                        <i data-lucide="delete" class="block mx-auto"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Is On</dt>
            <dd>{{ $setting->isOn }}</dd>

        </dl>

    </div>
</div>

@endsection
