@extends('layouts.plain')
@section('container')
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-md-4 bg-sage">
            <h3 class="pt-3">Konsultasi</h3>
            
            <!-- Toggler untuk daftar kontak -->
            <button class="btn btn-secondary d-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#contact-list-collapse" aria-expanded="false" aria-controls="contact-list-collapse">
                Daftar Kontak
            </button>

            <!-- Daftar kontak -->
            <div id="contact-list-collapse" class="collapse d-md-block">
                <ul id="contact-list" class="list-group my-3">
                    <!-- Daftar kontak akan ditambahkan secara dinamis melalui JavaScript -->
                </ul>
            </div>
        </div>
        <div class="col-md-8 bg-csage p-0">
            <div id="chat-header" class="p-3">
                <h5 id="contact-name" class="text-dark text-center">Anda belum memulai konsultasi</h5>
            </div>
            <div id="chat-messages" class="overflow-auto">
                <!-- Daftar pesan akan ditambahkan secara dinamis melalui JavaScript -->
            </div>
            <form id="send-message-form" action="{{ route('message.send') }}" method="POST">
                @csrf
                <input type="hidden" name="receiver_id" id="receiver-id" value="">
                <div class="input-group">
                    <textarea name="content" id="message-content" class="form-control border-0 p-2" rows="1" placeholder="Ketik pesan Anda"></textarea>
                    <button type="submit" class="btn btn-secondary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    // Mendapatkan elemen-elemen yang diperlukan
    var contactList = $('#contact-list');
    var contactName = $('#contact-name');
    var chatMessages = $('#chat-messages');
    var receiverIdInput = $('#receiver-id');
    var messageContentInput = $('#message-content');

   
    // Mendapatkan daftar kontak menggunakan AJAX
    $.ajax({
    type: 'GET',
    url: '{{ route('contact.list') }}',
    success: function(response) {
        // Menambahkan kontak ke daftar kontak
        response.contacts.forEach(function(contact) {
            var contactItem = $('<li>').addClass('list-group-item contact-item').text(contact.name);
            contactItem.data('receiver-id', contact.id);

            // Menambahkan toggler pada ukuran layar handphone
            if ($(window).width() <= 576) {
                var toggler = $('<a>').attr('href', '#').addClass('contact-toggler').html('<i class="fa fa-chevron-right"></i>');
                contactItem.prepend(toggler);
                contactItem.addClass('collapsed');
            }

            contactList.append(contactItem);
        });
    },
    error: function(xhr) {
        console.log(xhr.responseText);
    }
    });



    // Menangani klik pada kontak
    contactList.on('click', '.contact-item', function() {
        // Mengubah tampilan nama kontak di atas daftar pesan
        var contactItem = $(this);
        var receiverId = contactItem.data('receiver-id');
        var contactNameText = contactItem.text();
        contactName.text(contactNameText);
        $('#send-message-form').show();

        // Mengubah nilai input receiver_id pada form pengiriman pesan
        receiverIdInput.val(receiverId);

        // Menghapus pesan yang ada di daftar pesan
        chatMessages.empty();

        // Menghapus kontak yang aktif dan menambahkan class "active" pada kontak yang diklik
        contactList.find('.active').removeClass('active');

        contactItem.addClass('active');
        // Memperbarui daftar pesan dengan pesan-pesan terkini dari kontak yang diklik
        updateMessages(receiverId);
    });

    // Menangani pengiriman pesan
    $('#send-message-form').submit(function(event) {
        event.preventDefault();

        var receiverId = receiverIdInput.val();
        var messageContent = messageContentInput.val().trim();

        if (receiverId && messageContent) {
            // Mengirim pesan menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Menambahkan pesan yang terkirim ke daftar pesan
                    var message = response.message;
                    var outgoingMessage = $('<div>').addClass('message outgoing-message').text(message.content);
                    chatMessages.append(outgoingMessage);

                    // Membersihkan textarea pesan
                    messageContentInput.val('');

                    // Scroll ke bagian bawah daftar pesan
                    chatMessages.scrollTop(chatMessages[0].scrollHeight);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    // Fungsi untuk memperbarui daftar pesan dari server
   // Fungsi untuk memperbarui daftar pesan dari server
function updateMessages(receiverId) {
    if (receiverId) {
        // Mengambil pesan dari server menggunakan AJAX
        $.ajax({
            type: 'GET',
            url: '/chat/messages/' + receiverId,
            success: function(response) {
                // Menghapus semua pesan yang ada di daftar pesan
                chatMessages.empty();

                // Menambahkan pesan ke daftar pesan
                response.messages.forEach(function(message) {
                    var messageElement = $('<div>').addClass('message');

                    if (message.sender_id == receiverId) {
                        // Pesan dari penerima
                        messageElement.addClass('incoming-message');
                        messageElement.text(message.content);
                    } else {
                        // Pesan dari pengirim
                        messageElement.addClass('outgoing-message');
                        messageElement.text(message.content);
                    }

                    chatMessages.append(messageElement);
                });

                // Scroll ke bagian bawah daftar pesan
                chatMessages.scrollTop(chatMessages[0].scrollHeight);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

        // Memperbarui daftar pesan secara berkala setelah 2 detik
        setTimeout(function() {
            updateMessages(receiverId);
        }, 5000);
    }
}

});
</script>
