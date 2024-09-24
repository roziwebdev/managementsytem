<!-- chat-sidebar.blade.php -->
 
<div>
    @if($materialRequest)
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar{{ $materialRequest->id }}" aria-labelledby="sidebarLabel{{ $materialRequest->id }}">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel{{ $materialRequest->id }}">Chat for Material Request {{ $materialRequest->id }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Your chat messages display here -->
            <div id="chat-messages{{ $materialRequest->id }}">
                <!-- Chat messages will be displayed here -->
            </div>
            <!-- Form for sending chat messages -->
            <form wire:submit.prevent="sendMessage">
                <input type="text" wire:model.defer="message" placeholder="Type your message..." class="form-control mb-2">
                <input type="hidden" wire:model.defer="materialrequest_id" value="{{ $materialRequest->id }}">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
    @endif
</div>
