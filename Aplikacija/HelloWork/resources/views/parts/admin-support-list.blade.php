@foreach ($messages as $message)
    <tr id="row_ad_{{ $message->id }}" class="support-row" onclick="readMessage({{ $message->id }})">
        <td>
            <div class="w-100">
                @if (!$message->readed)
                    <b class="m-0">{{ $message->sender_name }}</b>
                @else
                    <p class="m-0" style="font-weight: 400">{{ $message->sender_name }}</p>
                @endif
            </div>
        </td>
        <td>
            @if (!$message->readed)
                <b class="m-0">{{ $message->sender_email }}</b>
            @else
                <p class="m-0" style="font-weight: 400">{{ $message->sender_email }}</p>
            @endif
        </td>
        <td>
            @php
                $newMessage = $message->message;
                if (strlen($message->message) > 30) {
                    $newMessage = Str::substr($message->message, 0, 30) . '...';
                }
            @endphp
            @if (!$message->readed)
                <b class="m-0">{{ $newMessage }}</b>
            @else
                <p class="m-0" style="font-weight: 400">{{ $newMessage }}</p>
            @endif
        </td>
        <td class="status-column">
            @if (!$message->readed)
                <b class="m-0">{{ date('d.m.Y', strtotime($message->created_at)) }}</b>
            @else
                <p class="saved-date m-0" style="font-weight: 400">{{ date('d.m.Y', strtotime($message->created_at)) }}
                </p>
            @endif
        </td>
    </tr>

    @component('dialogs.message-preview', [
        'id' => $message->id,
        'name' => $message->sender_name,
        'email' => $message->sender_email,
        'message' => $message->message,
        'time' => $message->created_at,
    ])
    @endcomponent
@endforeach
<script src="{{ asset('js/dialogs/actions.js') }}"></script>
<script src="{{ asset('js/admin/read-support-message.js') }}"></script>
