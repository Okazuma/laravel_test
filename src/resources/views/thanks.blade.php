@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alike&family=Karma:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Petrona:ital,wght@0,100..900;1,100..900&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
@endsection

@section('content')

    <div class="thanks__inner">

        <div class="background-text">Thank you
        </div>
        
        <div class="thanks-message">
            <p>お問い合わせありがとうございました</p>
                <form class="form" action="/" method="get">
                    <div class="thanks__button">
                        <button type="submit" class="thanks__button-submit"  >HOME
                        </button>
                    </div>
                </form>
        </div>
    </div>

@endsection
