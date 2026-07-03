{{-- Social Share Component --}}
@props(['url' => url()->current(), 'title' => ''])

<div class="social-share">
    <span class="share-label">Share this page:</span>
    <div class="share-buttons">
        <a href="https://wa.me/?text={{ urlencode($title . ' ' . $url) }}" target="_blank" class="share-btn whatsapp" title="Share on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank" class="share-btn facebook" title="Share on Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($title) }}" target="_blank" class="share-btn twitter" title="Share on Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <button onclick="copyToClipboard('{{ $url }}')" class="share-btn copy-link" title="Copy Link">
            <i class="fas fa-link"></i>
        </button>
    </div>
</div>

<style>
.social-share {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-top: 1px solid rgba(10, 58, 42, 0.1);
    border-bottom: 1px solid rgba(10, 58, 42, 0.1);
    margin: 20px 0;
}
.share-label {
    font-weight: 600;
    color: var(--primary-dark);
}
.share-buttons {
    display: flex;
    gap: 10px;
}
.share-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    text-decoration: none;
    transition: transform 0.2s, opacity 0.2s;
    border: none;
    cursor: pointer;
}
.share-btn:hover {
    transform: translateY(-2px);
    opacity: 0.9;
}
.share-btn.whatsapp { background: #25D366; }
.share-btn.facebook { background: #1877F2; }
.share-btn.twitter { background: #1DA1F2; }
.share-btn.copy-link { background: var(--primary); }
</style>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Link copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
