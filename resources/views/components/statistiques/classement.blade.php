<div>
    <div id="wg-api-football-standings"
        data-host="v3.football.api-sports.io"
        data-key="dd8bf5fada55f6377910ef4ee79f7916"
        data-league="{{$slot}}"
        data-team=""
        data-season="2023"
        data-theme="gray"
        data-show-errors="false"
        data-show-logos="true"
        class="wg_loader">
    </div>
    @pushOnce('scripts')
        <script
            type="module"
            src="https://widgets.api-sports.io/2.0.3/widgets.js">
        </script>
    @endPushOnce

</div>



