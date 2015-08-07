<div class="share-buttons">
	<p>{{ trans('laravelblog::messages.share.label') }}</p>
	<p class="share-button share-button__twitter">
		<a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title . ' ' . $post->getUrl()) }}" target="_blank">
			{{ trans('laravelblog::messages.share.twitter') }}
		</a>
	</p>
	<p class="share-button share-button__facebook">
		<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->getUrl()) }}" target="_blank">
			{{ trans('laravelblog::messages.share.facebook') }}
		</a>
	</p>
</div>