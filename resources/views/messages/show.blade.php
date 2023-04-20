@extends('../layout/' . $layout)

@section('subhead')
    <title>Accordion - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Message' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('messages.message.destroy', $message->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('messages.message.index') }}" class="btn btn-primary" title="Show All Message">
                        <i data-lucide="list" class="block mx-auto"></i>
                    </a>

                    <a href="{{ route('messages.message.create') }}" class="btn btn-success" title="Create New Message">
                        <i data-lucide="plus" class="block mx-auto"></i>
                    </a>
                    
                    <a href="{{ route('messages.message.edit', $message->id ) }}" class="btn btn-primary" title="Edit Message">
                        <i data-lucide="edit" class="block mx-auto"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Message" onclick="return confirm(&quot;Click Ok to delete Message.?&quot;)">
                        <i data-lucide="delete" class="block mx-auto"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Date</dt>
            <dd>{{ $message->date }}</dd>
            <dt>Topic</dt>
            <dd>{{ $message->topic }}</dd>
            <dt>User</dt>
            <dd>{{ $message->user }}</dd>
            <dt>Message</dt>
            <dd>{{ $message->message }}</dd>

        </dl>

    </div>
</div>

@endsection
