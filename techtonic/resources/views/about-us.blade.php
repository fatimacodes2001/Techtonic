@extends('layouts.master')

@section('title', 'About Us')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/about-us.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">About Us</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">History</h5>
        <p class="card-text">When it comes to admiring the trappings of other peoples’ lives—autumnal sweaters
          and doe-eyed dogs curled up on plush
          duvets, the deep suntans of exotic vacations, artfully arrayed homegrown tomatoes—there’s no medium
          quite like
          Instagram. Scrolling through can feel like catching glimpses through windows of the charmed,
          well-lit luxuries of other
          people’s lives—making one’s own feel lacking in comparison.</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Luxury is a Performance</h5>
        <p class="card-text">The clothes make the man. Perhaps no historical figure lived this concept quite
          like Louis XIV. With his dizzying
          renovation of Versailles in the late 1600s, and his establishment of a court culture with a strict
          and lavish dress
          code, the French king equated a man’s possessions with his power.
          By wearing a luxury watch, you are also joining a truly exclusive club. After all, these are the watches worn
          by presidents, Hollywood stars, and royalty.

          But how to choose the best luxury watch for you? How to decide between a traditional and refined timepiece and
          something more cutting-edge and avant-garde?

          A good place to start is with this list of the 55 best luxury watch brands today. This list was created based
          on detailed research to identify the luxury brands that enjoy a global reputation for delivering high-quality
          timepieces. A demonstration of exquisite craftsmanship, incomparable aesthetic sensibility, and a passion for
          pushing boundaries have distinguished these brands as the best luxury watchmakers today.
        </p>
      </div>
    </div>

    <div class="card" style="border-radius: 0; background-color: inherit;">
      <h5 class="card-title" style="text-align: center;">OWNER'S MESSAGE</h5>
      <div class="wrapper">
        <img class="owner" src="/img/elon.jpg" alt="ELON MUSK">

        <p class="card-text side">When it comes to admiring the trappings of other peoples’ lives—autumnal sweaters
          and doe-eyed dogs curled up on plush
          duvets, the deep suntans of exotic vacations, artfully arrayed homegrown tomatoes—there’s no medium
          quite like
          Instagram. Scrolling through can feel like catching glimpses through windows of the charmed,
          well-lit luxuries of other
          people’s lives—making one’s own feel lacking in comparison.
          The clothes make the man. Perhaps no historical figure lived this concept quite like Louis XIV. With his
          dizzying renovation of Versailles in the late 1600s, and his establishment of a court culture with a strict
          and lavish dress code, the French king equated a man’s possessions with his power.
        </p>
      </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection