<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Comment</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body text-wrap">
    <form method="POST" action="{{route('storechat.store')}}" id="myForm">
        @csrf
        <div class="d-flex align-items-center mb-3">
            <input class="form-control form-control-sm" type="hidden" value="{{ $user->id }}" name="materialrequest_id"/>
            <input class="form-control form-control-sm" type="hidden" value="{{ Auth::user()->name }}" name="created"/>
            <input class="form-control form-control-sm" type="text" placeholder="Message..." name="chat"/>
            <button type="submit" class="btn btn-sm btn-primary ms-2">Send</button>
        </div>
    </form>
    <div class="chat">
        @foreach ($chats as $chat)
            @if ($user->id == $chat->materialrequest_id)
                <div class="py-3 chat-message">
                    <span class="fw-bold">{{ $chat->created }}</span> : {{ $chat->chat }}
                </div>
            @endif
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '/purchasing/mr',
                data: formData,
                success: function(response) {
                    $('.chat').append('<div class="py-3 chat-message"><span class="fw-bold">' + response.created + '</span> : ' + response.chat + '</div>');
                    // Menghapus nilai input setelah pesan dikirim
                    $('input[name="chat"]').val('');
                }
            });
        });
    });
</script>
