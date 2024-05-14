@extends('layouts.home')

@section('content')

<div class="dooze">
  <p>Vous appréciez Dooze ?</p>
  <p>Dooze ne vend pas vos données à des fins publicitaires ou autres. Il ne diffuse pas non plus de publicité.</p>
  <p>Le site fonctionne uniquement par don. </p>
  <p>Pour que ce projet continue à fonctionner dans de bonnnes conditions, n'hésitez pas à faire un don. La moitié
    des fonds seront reversés au site de votre club favori. N'oubliez donc pas à indiquer votre club favori dans le
    processus. D'avance, nous vous remercions beaucoup !!! </p>
  <br>

  <p>Et continuez à supporter votre club !!!</p>

  <div>
    <div id="donate-button-container">
      <div id="donate-button"></div>
    </div>
 {{--    <div style="text-align: center">
      <div id="paypal-donate-button-container" style="width:150px; height:auto"></div>
    </div> --}}
  </div>
  @push('scripts')
    <script>
      PayPal.Donation.Button({
      env:'production',
      hosted_button_id:'H779JA5KP4BLJ',
      image: {
      src:'https://pics.paypal.com/00/s/MmFlNzk1ZjktNjdjZC00ZDUzLTg3ZjUtYWNiYTFjYWI0MDNl/file.PNG',
      alt:'Donate with PayPal button',
      title:'PayPal - The safer, easier way to pay online!',
      }
      }).render('#donate-button');
    </script>

  @endpush


  @endsection