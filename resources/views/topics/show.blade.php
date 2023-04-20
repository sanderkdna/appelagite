@extends('../layout/' . $layout)

@section('subhead')
    <title>Accordion - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($topic->title) ? $topic->title : 'Topic' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('topics.topic.destroy', $topic->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('topics.topic.index') }}" class="btn btn-primary" title="Show All Topic">
                        <i data-lucide="list" class="block mx-auto"></i>
                    </a>

                    <a href="{{ route('topics.topic.create') }}" class="btn btn-success" title="Create New Topic">
                        <i data-lucide="plus" class="block mx-auto"></i>
                    </a>
                    
                    <a href="{{ route('topics.topic.edit', $topic->id ) }}" class="btn btn-primary" title="Edit Topic">
                        <i data-lucide="edit" class="block mx-auto"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Topic" onclick="return confirm(&quot;Click Ok to delete Topic.?&quot;)">
                        <i data-lucide="delete" class="block mx-auto"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Date</dt>
            <dd>{{ $topic->date }}</dd>
            <dt>Title</dt>
            <dd>{{ $topic->title }}</dd>

        </dl>

    </div>
</div>

@endsection
