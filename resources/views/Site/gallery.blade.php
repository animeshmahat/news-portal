@extends('site.layouts.app')
@section('css')
<style>
    .gallery-block.grid-gallery {
        padding-bottom: 60px;
        padding-top: 60px;
    }

    .gallery-block.grid-gallery .heading {
        margin-bottom: 50px;
        text-align: center;
    }

    .gallery-block.grid-gallery .heading h2 {
        font-weight: bold;
        font-size: 1.4rem;
        text-transform: uppercase;
    }

    .gallery-block.grid-gallery a:hover {
        opacity: 0.8;
    }

    .gallery-block.grid-gallery .item img {
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
        transition: 0.4s;
    }

    .gallery-block.grid-gallery .item {
        margin-bottom: 20px;
    }

    @media (min-width: 576px) {

        .gallery-block.grid-gallery .scale-on-hover:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.15) !important;
        }
    }
</style>

@endsection
@section('content')
<section class="gallery-block grid-gallery">
    <div class="container">
        <div class="heading">
            <h2>Gallery</h2>
        </div>
        <div class="row">
            @if(isset($data['gallery']))
            @foreach($data['gallery'] as $row)
            <div class="col-md-6 col-lg-4 item">
                <a class="lightbox" href="{{route('site.album' , $row->id)}}">
                    <img class="img-fluid image scale-on-hover" src="{{asset('/uploads/gallery/' . $row->thumbnail)}}" style="width: 400px; height: 240px; object-fit:contain;">
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    baguetteBox.run('.grid-gallery', {
        animation: 'slideIn'
    });
</script>
@endsection