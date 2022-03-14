@props(['height', 'width'])
<div>
    <img class="rounded-full" height={{ $height }} width={{ $width }} src="{{ Auth()->User()->thumbnail != null ? asset('storage/' . Auth()->user()->thumbnail) : '/images/lary-avatar.svg' }}" alt="" class="rounded-xl">
</div>
