{{-- Modal untuk membaca lebih lanjut --}}
@foreach ($data as $key => $d)
    <div class="modal fade" id="Read_More_{{ $d->laporan_id }}" tabindex="-1" role="dialog" aria-labelledby="Read_MoreTitle_{{ $d->laporan_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="{{ asset('storage/photo-acara/masjid-rusak.jpg') }}" class="card-img-top" alt="Placeholder" style="width: 100%; height: 200px; object-fit: cover;">
                <div class="modal-header">
                    <h5 class="modal-title" id="Read_MoreTitle_{{ $d->laporan_id }}">{{ $d->judul }}</h5>
                </div>
                <div class="modal-body mb-4">
                    <p>{{ $d->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Modal untuk membuat comment --}}
@foreach($data as $key => $d)
    <div class="modal fade" id="comment_{{ $d->laporan_id }}" tabindex="-1" role="dialog" aria-labelledby="commentTitle_{{ $d->laporan_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mail-container">
                                <div class="mail-header">
                                    <div class="mail-title">{{ $d->judul }}</div>
                                </div>
                                <div class="comments-container">
                                    @foreach ($d->comments as $c)
                                        <div class="mail-info">
                                            <div class="mail-author">
                                                <img src="{{ asset('storage/photo-acara/orang.png') }}" alt="">
                                                <div class="mail-author-info">
                                                    <span class="mail-author-name">{{ $c->user->name }}</span>
                                                    <p>{{ $c->content }}</p>
                                                </div>
                                            </div>
                                            <div class="mail-other-info">
                                                <span>{{ $c->created_at->format('H:i') }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="comment-form mt-3">
                                    <form id="commentForm_{{ $d->laporan_id }}" method="POST" action="{{ route('comments.store') }}">
                                        @csrf
                                        <input type="hidden" name="laporan_id" value="{{ $d->laporan_id }}">
                                        <div class="form-group">
                                            <textarea class="form-control" name="content" rows="3" placeholder="Your Comment" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Modal untuk membaca comment --}}
@foreach($data as $d)
    <div class="modal fade" id="datacomment_{{ $d->laporan_id }}" tabindex="-1" role="dialog" aria-labelledby="commentTitle_{{ $d->laporan_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mail-container">
                                <div class="mail-header">
                                    <div class="mail-title">{{ $d->judul }}</div>
                                </div>
                                <div class="mail-info">
                                    <div class="mail-author">
                                        <img src="{{ asset('storage/photo-acara/orang.png') }}" alt="">
                                        <div class="mail-author-info">
                                            <span class="mail-author-name">{{ $d->author }}</span>
                                            <p>{{ $d->comment }}</p>
                                        </div>
                                    </div>
                                    <div class="mail-other-info">
                                        <span>{{ $d->created_at }}</span>
                                    </div>
                                </div>
                                <div class="mail-text">
                                    @foreach($d->comments as $comment)
                                        <div class="comment">
                                            <div class="mail-info">
                                                <div class="mail-author">
                                                    <img src="{{ asset('storage/photo-acara/orang.png') }}" alt="">
                                                    <div class="mail-author-info">
                                                        <span class="mail-author-name">{{ $comment->user->username }}</span>
                                                        <p>{{ $comment->content }}</p>
                                                    </div>
                                                </div>
                                                <div class="mail-other-info">
                                                    <span>{{ $comment->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach




<script>
    $(document).ready(function(){
        $('.Read_More').on('click', function(){
            var modalId = $(this).data('target');
            $(modalId).modal('show');
        });
    });
</script>

{{-- jQuery to handle form submission --}}
<script>
    $(document).ready(function() {
        @foreach($data as $d)
            $('#commentForm_{{ $d->laporan_id }}').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                
                $.ajax({
                    url: '{{ route('comments.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Refresh the page to display the new comment
                        } else {
                            alert('Failed to submit comment');
                        }
                    },
                    error: function() {
                        alert('Error submitting comment');
                    }
                });
            });
        @endforeach
    });
</script>
