<div class="messenger-sendCard" style="margin-top: 100px;">
    <!-- <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" onkeypress="sendMessageOnEnter(event)"> -->
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="to_id" value="{{request()->segment(count(request()->segments()))}}">
        <!-- <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label> -->
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.." style="padding-left: 5%;" id="msgInput"></textarea>
        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>
    </form>
</div>