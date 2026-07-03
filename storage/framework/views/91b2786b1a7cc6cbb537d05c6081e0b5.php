
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['url' => url()->current(), 'title' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['url' => url()->current(), 'title' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="social-share">
    <span class="share-label">Share this page:</span>
    <div class="share-buttons">
        <a href="https://wa.me/?text=<?php echo e(urlencode($title . ' ' . $url)); ?>" target="_blank" class="share-btn whatsapp" title="Share on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($url)); ?>" target="_blank" class="share-btn facebook" title="Share on Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($url)); ?>&text=<?php echo e(urlencode($title)); ?>" target="_blank" class="share-btn twitter" title="Share on Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <button onclick="copyToClipboard('<?php echo e($url); ?>')" class="share-btn copy-link" title="Copy Link">
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
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/components/social-share.blade.php ENDPATH**/ ?>