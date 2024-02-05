@extends('site.layouts.app')
@section('title', 'Home')
@section('css')
@endsection

@section('content')
<div class="bigyapan__banner">
    <div class="custom-container">
        <div class="bigyapan">
            <div class="adalyticsblock" campaign="m1RHPbZJdYiAc6WvhzsJvbxHjcCJPpmcRKm03yjNNVrZ1iFVIp" width="100%"></div>
        </div>
    </div>
</div>

<!-- breaking news -->
@include('site.includes.index.breaking-news')

<div class="bigyapan__banner">
    <div class="custom-container">
        <div class="bigyapan">
            <div class="adalyticsblock" campaign="4aRKoKfuC1kQoivlrEh0HMa5Fo6xJJIUnupNIbrke2r65bXDDx" width="100%"></div>
        </div>
    </div>
</div>

<!-- updates and most read -->
@include('site.includes.index.updates-and-most-read')

<div class="bigyapan__banner">
    <div class="custom-container">
        <div class="bigyapan">
            <div class="adalyticsblock" campaign="w3AFmqG6bHI10UizAuQKJvO5yjhaJ3hsLhDqiuldJXwUlHnZKA" width="100%"></div>
        </div>
    </div>
</div>

<!-- gadgets news -->
@include('site.includes.index.gadget-news')

<!-- telecom news -->
@include('site.includes.index.telecom-news')

<div class="bigyapan__banner">
    <div class="custom-container">
        <div class="bigyapan">
            <div class="adalyticsblock" campaign="kn11nmv1ZiA2HD8J6uH1Mnz4lx7phkV7mQvJuPlYEcMqKDABoF" width="100%"></div>
        </div>
    </div>
</div>

<!-- new technology view news -->
@include('site.includes.index.new-technology-and-view-news')

<div class="bigyapan__banner">
    <div class="custom-container">
        <div class="bigyapan">
            <div class="adalyticsblock" campaign="Z9vyKZqDD7CubSDrnZdXCKWLiKWGDzDfbovz2i1HmPW66ssroY" width="100%"></div>
        </div>
    </div>
</div>

<!-- startup and profile news -->
@include('site.includes.index.startup-and-profile-news')

<div class="bigyapan__banner">
    <div class="custom-container">
        <div class="bigyapan">
            <div class="adalyticsblock" campaign="JAJKP2KMkbvpQCO8vpMXnyn8WUpwHVwekdS8vbBXEbb3oaRY8n" width="100%"></div>
        </div>
    </div>
</div>

<!-- featured news -->
@include('site.includes.index.featured-news')

<!-- pradesh -->
@include('site.includes.index.pradesh-news')

<!-- policy news -->
@include('site.includes.index.policy-news')

<!-- fintech and security news -->
@include('site.includes.index.fintech-and-security-news')

<!-- interview/opinion and guide news -->
@include('site.includes.index.interview-opinion-and-guide-news')

<!-- auto news -->
@include('site.includes.index.auto-news')

<!-- tips news -->
@include('site.includes.index.tips-news')

<!-- triplet news section -->
@include('site.includes.index.triplet-news')

<!-- video news -->
@include('site.includes.index.video')
@endsection

@section('js')
@endsection