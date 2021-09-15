@extends('layouts.admin')

@section('meta')
    <title>Settings | Workday Time Clock</title>
    <meta name="description" content="Workday Settings">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("General Settings") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
           
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="system-tab" data-bs-toggle="tab" data-bs-target="#system" href="#system" role="tab" aria-controls="system" aria-selected="true">{{ __("System") }}</a>
              </li>

              <li class="nav-item" role="presentation">
                <a class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" href="#about" role="tab" aria-controls="about" aria-selected="true">{{ __("About") }}</a>
              </li>

              <li class="nav-item" role="presentation">
                <a class="nav-link" id="attributions-tab" data-bs-toggle="tab" data-bs-target="#attributions" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">{{ __("Attributions") }}</a>
              </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">

                <div class="tab-pane fade show active" id="system" role="tabpanel" aria-labelledby="system-tab">
                    <div class="col-md-6">
                    <form action="{{ url('admin/settings/update') }}" method="post" class="needs-validation" novalidate autocomplete="off" accept-charset="utf-8">
                        @csrf
                        <p class="mb-0 text-uppercase">{{ __("Localization") }}</p>
                        <hr class="mt-0">

                        <div class="mb-3">
                          <label for="timezone" class="mb-0 form-label">{{ __("Time zone") }}</label><br>
                          <small class="text-muted">{{ __("Select your region and city to sync time for attendance") }}</small>
                          <select name="timezone" class="form-select" required>
                            <option value="" disabled selected>Choose...</option>
                            <option value="Pacific/Midway" @if($data->timezone == "Pacific/Midway") selected @endif>(UTC -11:00) Pacific/Midway</option>
                            <option value="Pacific/Niue" @if($data->timezone == "Pacific/Niue") selected @endif>(UTC -11:00) Pacific/Niue</option>
                            <option value="Pacific/Pago_Pago" @if($data->timezone == "Pacific/Pago_Pago") selected @endif>(UTC -11:00) Pacific/Pago_Pago</option>
                            <option value="America/Adak" @if($data->timezone == "America/Adak") selected @endif>(UTC -10:00) America/Adak</option>
                            <option value="Pacific/Honolulu" @if($data->timezone == "Pacific/Honolulu") selected @endif>(UTC -10:00) Pacific/Honolulu</option>
                            <option value="Pacific/Rarotonga" @if($data->timezone == "Pacific/Rarotonga") selected @endif>(UTC -10:00) Pacific/Rarotonga</option>
                            <option value="Pacific/Tahiti" @if($data->timezone == "Pacific/Tahiti") selected @endif>(UTC -10:00) Pacific/Tahiti</option>
                            <option value="Pacific/Marquesas" @if($data->timezone == "Pacific/Marquesas") selected @endif>(UTC -09:30) Pacific/Marquesas</option>
                            <option value="America/Anchorage" @if($data->timezone == "America/Anchorage") selected @endif>(UTC -09:00) America/Anchorage</option>
                            <option value="America/Juneau" @if($data->timezone == "America/Juneau") selected @endif>(UTC -09:00) America/Juneau</option>
                            <option value="America/Metlakatla" @if($data->timezone == "America/Metlakatla") selected @endif>(UTC -09:00) America/Metlakatla</option>
                            <option value="America/Nome" @if($data->timezone == "America/Nome") selected @endif>(UTC -09:00) America/Nome</option>
                            <option value="America/Sitka" @if($data->timezone == "America/Sitka") selected @endif>(UTC -09:00) America/Sitka</option>
                            <option value="America/Yakutat" @if($data->timezone == "America/Yakutat") selected @endif>(UTC -09:00) America/Yakutat</option>
                            <option value="Pacific/Gambier" @if($data->timezone == "Pacific/Gambier") selected @endif>(UTC -09:00) Pacific/Gambier</option>
                            <option value="America/Dawson" @if($data->timezone == "America/Dawson") selected @endif>(UTC -08:00) America/Dawson</option>
                            <option value="America/Los_Angeles" @if($data->timezone == "America/Los_Angeles") selected @endif>(UTC -08:00) America/Los_Angeles</option>
                            <option value="America/Tijuana" @if($data->timezone == "America/Tijuana") selected @endif>(UTC -08:00) America/Tijuana</option>
                            <option value="America/Vancouver" @if($data->timezone == "America/Vancouver") selected @endif>(UTC -08:00) America/Vancouver</option>
                            <option value="America/Whitehorse" @if($data->timezone == "America/Whitehorse") selected @endif>(UTC -08:00) America/Whitehorse</option>
                            <option value="Pacific/Pitcairn" @if($data->timezone == "Pacific/Pitcairn") selected @endif>(UTC -08:00) Pacific/Pitcairn</option>
                            <option value="America/Boise" @if($data->timezone == "America/Boise") selected @endif>(UTC -07:00) America/Boise</option>
                            <option value="America/Cambridge_Bay" @if($data->timezone == "America/Cambridge_Bay") selected @endif>(UTC -07:00) America/Cambridge_Bay</option>
                            <option value="America/Chihuahua" @if($data->timezone == "America/Chihuahua") selected @endif>(UTC -07:00) America/Chihuahua</option>
                            <option value="America/Creston" @if($data->timezone == "America/Creston") selected @endif>(UTC -07:00) America/Creston</option>
                            <option value="America/Dawson_Creek" @if($data->timezone == "America/Dawson_Creek") selected @endif>(UTC -07:00) America/Dawson_Creek</option>
                            <option value="America/Denver" @if($data->timezone == "America/Denver") selected @endif>(UTC -07:00) America/Denver</option>
                            <option value="America/Edmonton" @if($data->timezone == "America/Edmonton") selected @endif>(UTC -07:00) America/Edmonton</option>
                            <option value="America/Fort_Nelson" @if($data->timezone == "America/Fort_Nelson") selected @endif>(UTC -07:00) America/Fort_Nelson</option>
                            <option value="America/Hermosillo" @if($data->timezone == "America/Hermosillo") selected @endif>(UTC -07:00) America/Hermosillo</option>
                            <option value="America/Inuvik" @if($data->timezone == "America/Inuvik") selected @endif>(UTC -07:00) America/Inuvik</option>
                            <option value="America/Mazatlan" @if($data->timezone == "America/Mazatlan") selected @endif>(UTC -07:00) America/Mazatlan</option>
                            <option value="America/Ojinaga" @if($data->timezone == "America/Ojinaga") selected @endif>(UTC -07:00) America/Ojinaga</option>
                            <option value="America/Phoenix" @if($data->timezone == "America/Phoenix") selected @endif>(UTC -07:00) America/Phoenix</option>
                            <option value="America/Yellowknife" @if($data->timezone == "America/Yellowknife") selected @endif>(UTC -07:00) America/Yellowknife</option>
                            <option value="America/Bahia_Banderas" @if($data->timezone == "America/Bahia_Banderas") selected @endif>(UTC -06:00) America/Bahia_Banderas</option>
                            <option value="America/Belize" @if($data->timezone == "America/Belize") selected @endif>(UTC -06:00) America/Belize</option>
                            <option value="America/Chicago" @if($data->timezone == "America/Chicago") selected @endif>(UTC -06:00) America/Chicago</option>
                            <option value="America/Costa_Rica" @if($data->timezone == "America/Costa_Rica") selected @endif>(UTC -06:00) America/Costa_Rica</option>
                            <option value="America/El_Salvador" @if($data->timezone == "America/El_Salvador") selected @endif>(UTC -06:00) America/El_Salvador</option>
                            <option value="America/Guatemala" @if($data->timezone == "America/Guatemala") selected @endif>(UTC -06:00) America/Guatemala</option>
                            <option value="America/Indiana/Knox" @if($data->timezone == "America/Indiana/Knox") selected @endif>(UTC -06:00) America/Indiana/Knox</option>
                            <option value="America/Indiana/Tell_City" @if($data->timezone == "America/Indiana/Tell_City") selected @endif>(UTC -06:00) America/Indiana/Tell_City</option>
                            <option value="America/Managua" @if($data->timezone == "America/Managua") selected @endif>(UTC -06:00) America/Managua</option>
                            <option value="America/Matamoros" @if($data->timezone == "America/Matamoros") selected @endif>(UTC -06:00) America/Matamoros</option>
                            <option value="America/Menominee" @if($data->timezone == "America/Menominee") selected @endif>(UTC -06:00) America/Menominee</option>
                            <option value="America/Merida" @if($data->timezone == "America/Merida") selected @endif>(UTC -06:00) America/Merida</option>
                            <option value="America/Mexico_City" @if($data->timezone == "America/Mexico_City") selected @endif>(UTC -06:00) America/Mexico_City</option>
                            <option value="America/Monterrey" @if($data->timezone == "America/Monterrey") selected @endif>(UTC -06:00) America/Monterrey</option>
                            <option value="America/North_Dakota/Beulah" @if($data->timezone == "America/North_Dakota/Beulah") selected @endif>(UTC -06:00) America/North_Dakota/Beulah</option>
                            <option value="America/North_Dakota/Center" @if($data->timezone == "America/North_Dakota/Center") selected @endif>(UTC -06:00) America/North_Dakota/Center</option>
                            <option value="America/North_Dakota/New_Salem" @if($data->timezone == "America/North_Dakota/New_Salem") selected @endif>(UTC -06:00) America/North_Dakota/New_Salem</option>
                            <option value="America/Rainy_River" @if($data->timezone == "America/Rainy_River") selected @endif>(UTC -06:00) America/Rainy_River</option>
                            <option value="America/Rankin_Inlet" @if($data->timezone == "America/Rankin_Inlet") selected @endif>(UTC -06:00) America/Rankin_Inlet</option>
                            <option value="America/Regina" @if($data->timezone == "America/Regina") selected @endif>(UTC -06:00) America/Regina</option>
                            <option value="America/Resolute" @if($data->timezone == "America/Resolute") selected @endif>(UTC -06:00) America/Resolute</option>
                            <option value="America/Swift_Current" @if($data->timezone == "America/Swift_Current") selected @endif>(UTC -06:00) America/Swift_Current</option>
                            <option value="America/Tegucigalpa" @if($data->timezone == "America/Tegucigalpa") selected @endif>(UTC -06:00) America/Tegucigalpa</option>
                            <option value="America/Winnipeg" @if($data->timezone == "America/Winnipeg") selected @endif>(UTC -06:00) America/Winnipeg</option>
                            <option value="Pacific/Galapagos" @if($data->timezone == "Pacific/Galapagos") selected @endif>(UTC -06:00) Pacific/Galapagos</option>
                            <option value="America/Atikokan" @if($data->timezone == "America/Atikokan") selected @endif>(UTC -05:00) America/Atikokan</option>
                            <option value="America/Bogota" @if($data->timezone == "America/Bogota") selected @endif>(UTC -05:00) America/Bogota</option>
                            <option value="America/Cancun" @if($data->timezone == "America/Cancun") selected @endif>(UTC -05:00) America/Cancun</option>
                            <option value="America/Cayman" @if($data->timezone == "America/Cayman") selected @endif>(UTC -05:00) America/Cayman</option>
                            <option value="America/Detroit" @if($data->timezone == "America/Detroit") selected @endif>(UTC -05:00) America/Detroit</option>
                            <option value="America/Eirunepe" @if($data->timezone == "America/Eirunepe") selected @endif>(UTC -05:00) America/Eirunepe</option>
                            <option value="America/Guayaquil" @if($data->timezone == "America/Guayaquil") selected @endif>(UTC -05:00) America/Guayaquil</option>
                            <option value="America/Havana" @if($data->timezone == "America/Havana") selected @endif>(UTC -05:00) America/Havana</option>
                            <option value="America/Indiana/Indianapolis" @if($data->timezone == "America/Indiana/Indianapolis") selected @endif>(UTC -05:00) America/Indiana/Indianapolis</option>
                            <option value="America/Indiana/Marengo" @if($data->timezone == "America/Indiana/Marengo") selected @endif>(UTC -05:00) America/Indiana/Marengo</option>
                            <option value="America/Indiana/Petersburg" @if($data->timezone == "America/Indiana/Petersburg") selected @endif>(UTC -05:00) America/Indiana/Petersburg</option>
                            <option value="America/Indiana/Vevay" @if($data->timezone == "America/Indiana/Vevay") selected @endif>(UTC -05:00) America/Indiana/Vevay</option>
                            <option value="America/Indiana/Vincennes" @if($data->timezone == "America/Indiana/Vincennes") selected @endif>(UTC -05:00) America/Indiana/Vincennes</option>
                            <option value="America/Indiana/Winamac" @if($data->timezone == "America/Indiana/Winamac") selected @endif>(UTC -05:00) America/Indiana/Winamac</option>
                            <option value="America/Iqaluit" @if($data->timezone == "America/Iqaluit") selected @endif>(UTC -05:00) America/Iqaluit</option>
                            <option value="America/Jamaica" @if($data->timezone == "America/Jamaica") selected @endif>(UTC -05:00) America/Jamaica</option>
                            <option value="America/Kentucky/Louisville" @if($data->timezone == "America/Kentucky/Louisville") selected @endif>(UTC -05:00) America/Kentucky/Louisville</option>
                            <option value="America/Kentucky/Monticello" @if($data->timezone == "America/Kentucky/Monticello") selected @endif>(UTC -05:00) America/Kentucky/Monticello</option>
                            <option value="America/Lima" @if($data->timezone == "America/Lima") selected @endif>(UTC -05:00) America/Lima</option>
                            <option value="America/Nassau" @if($data->timezone == "America/Nassau") selected @endif>(UTC -05:00) America/Nassau</option>
                            <option value="America/New_York" @if($data->timezone == "America/New_York") selected @endif>(UTC -05:00) America/New_York</option>
                            <option value="America/Nipigon" @if($data->timezone == "America/Nipigon") selected @endif>(UTC -05:00) America/Nipigon</option>
                            <option value="America/Panama" @if($data->timezone == "America/Panama") selected @endif>(UTC -05:00) America/Panama</option>
                            <option value="America/Pangnirtung" @if($data->timezone == "America/Pangnirtung") selected @endif>(UTC -05:00) America/Pangnirtung</option>
                            <option value="America/Port-au-Prince" @if($data->timezone == "America/Port-au-Prince") selected @endif>(UTC -05:00) America/Port-au-Prince</option>
                            <option value="America/Rio_Branco" @if($data->timezone == "America/Rio_Branco") selected @endif>(UTC -05:00) America/Rio_Branco</option>
                            <option value="America/Thunder_Bay" @if($data->timezone == "America/Thunder_Bay") selected @endif>(UTC -05:00) America/Thunder_Bay</option>
                            <option value="America/Toronto" @if($data->timezone == "America/Toronto") selected @endif>(UTC -05:00) America/Toronto</option>
                            <option value="Pacific/Easter" @if($data->timezone == "Pacific/Easter") selected @endif>(UTC -05:00) Pacific/Easter</option>
                            <option value="America/Anguilla" @if($data->timezone == "America/Anguilla") selected @endif>(UTC -04:00) America/Anguilla</option>
                            <option value="America/Antigua" @if($data->timezone == "America/Antigua") selected @endif>(UTC -04:00) America/Antigua</option>
                            <option value="America/Aruba" @if($data->timezone == "America/Aruba") selected @endif>(UTC -04:00) America/Aruba</option>
                            <option value="America/Barbados" @if($data->timezone == "America/Barbados") selected @endif>(UTC -04:00) America/Barbados</option>
                            <option value="America/Blanc-Sablon" @if($data->timezone == "America/Blanc-Sablon") selected @endif>(UTC -04:00) America/Blanc-Sablon</option>
                            <option value="America/Boa_Vista" @if($data->timezone == "America/Boa_Vista") selected @endif>(UTC -04:00) America/Boa_Vista</option>
                            <option value="America/Caracas" @if($data->timezone == "America/Caracas") selected @endif>(UTC -04:00) America/Caracas</option>
                            <option value="America/Curacao" @if($data->timezone == "America/Curacao") selected @endif>(UTC -04:00) America/Curacao</option>
                            <option value="America/Dominica" @if($data->timezone == "America/Dominica") selected @endif>(UTC -04:00) America/Dominica</option>
                            <option value="America/Glace_Bay" @if($data->timezone == "America/Glace_Bay") selected @endif>(UTC -04:00) America/Glace_Bay</option>
                            <option value="America/Goose_Bay" @if($data->timezone == "America/Goose_Bay") selected @endif>(UTC -04:00) America/Goose_Bay</option>
                            <option value="America/Grand_Turk" @if($data->timezone == "America/Grand_Turk") selected @endif>(UTC -04:00) America/Grand_Turk</option>
                            <option value="America/Grenada" @if($data->timezone == "America/Grenada") selected @endif>(UTC -04:00) America/Grenada</option>
                            <option value="America/Guadeloupe" @if($data->timezone == "America/Guadeloupe") selected @endif>(UTC -04:00) America/Guadeloupe</option>
                            <option value="America/Guyana" @if($data->timezone == "America/Guyana") selected @endif>(UTC -04:00) America/Guyana</option>
                            <option value="America/Halifax" @if($data->timezone == "America/Halifax") selected @endif>(UTC -04:00) America/Halifax</option>
                            <option value="America/Kralendijk" @if($data->timezone == "America/Kralendijk") selected @endif>(UTC -04:00) America/Kralendijk</option>
                            <option value="America/La_Paz" @if($data->timezone == "America/La_Paz") selected @endif>(UTC -04:00) America/La_Paz</option>
                            <option value="America/Lower_Princes" @if($data->timezone == "America/Lower_Princes") selected @endif>(UTC -04:00) America/Lower_Princes</option>
                            <option value="America/Manaus" @if($data->timezone == "America/Manaus") selected @endif>(UTC -04:00) America/Manaus</option>
                            <option value="America/Marigot" @if($data->timezone == "America/Marigot") selected @endif>(UTC -04:00) America/Marigot</option>
                            <option value="America/Martinique" @if($data->timezone == "America/Martinique") selected @endif>(UTC -04:00) America/Martinique</option>
                            <option value="America/Moncton" @if($data->timezone == "America/Moncton") selected @endif>(UTC -04:00) America/Moncton</option>
                            <option value="America/Montserrat" @if($data->timezone == "America/Montserrat") selected @endif>(UTC -04:00) America/Montserrat</option>
                            <option value="America/Port_of_Spain" @if($data->timezone == "America/Port_of_Spain") selected @endif>(UTC -04:00) America/Port_of_Spain</option>
                            <option value="America/Porto_Velho" @if($data->timezone == "America/Porto_Velho") selected @endif>(UTC -04:00) America/Porto_Velho</option>
                            <option value="America/Puerto_Rico" @if($data->timezone == "America/Puerto_Rico") selected @endif>(UTC -04:00) America/Puerto_Rico</option>
                            <option value="America/Santo_Domingo" @if($data->timezone == "America/Santo_Domingo") selected @endif>(UTC -04:00) America/Santo_Domingo</option>
                            <option value="America/St_Barthelemy" @if($data->timezone == "America/St_Barthelemy") selected @endif>(UTC -04:00) America/St_Barthelemy</option>
                            <option value="America/St_Kitts" @if($data->timezone == "America/St_Kitts") selected @endif>(UTC -04:00) America/St_Kitts</option>
                            <option value="America/St_Lucia" @if($data->timezone == "America/St_Lucia") selected @endif>(UTC -04:00) America/St_Lucia</option>
                            <option value="America/St_Thomas" @if($data->timezone == "America/St_Thomas") selected @endif>(UTC -04:00) America/St_Thomas</option>
                            <option value="America/St_Vincent" @if($data->timezone == "America/St_Vincent") selected @endif>(UTC -04:00) America/St_Vincent</option>
                            <option value="America/Thule" @if($data->timezone == "America/Thule") selected @endif>(UTC -04:00) America/Thule</option>
                            <option value="America/Tortola" @if($data->timezone == "America/Tortola") selected @endif>(UTC -04:00) America/Tortola</option>
                            <option value="Atlantic/Bermuda" @if($data->timezone == "Atlantic/Bermuda") selected @endif>(UTC -04:00) Atlantic/Bermuda</option>
                            <option value="America/St_Johns" @if($data->timezone == "America/St_Johns") selected @endif>(UTC -03:30) America/St_Johns</option>
                            <option value="America/Araguaina" @if($data->timezone == "America/Araguaina") selected @endif>(UTC -03:00) America/Araguaina</option>
                            <option value="America/Argentina/Buenos_Aires" @if($data->timezone == "America/Argentina/Buenos_Aires") selected @endif>(UTC -03:00) America/Argentina/Buenos_Aires</option>
                            <option value="America/Argentina/Catamarca" @if($data->timezone == "America/Argentina/Catamarca") selected @endif>(UTC -03:00) America/Argentina/Catamarca</option>
                            <option value="America/Argentina/Cordoba" @if($data->timezone == "America/Argentina/Cordoba") selected @endif>(UTC -03:00) America/Argentina/Cordoba</option>
                            <option value="America/Argentina/Jujuy" @if($data->timezone == "America/Argentina/Jujuy") selected @endif>(UTC -03:00) America/Argentina/Jujuy</option>
                            <option value="America/Argentina/La_Rioja" @if($data->timezone == "America/Argentina/La_Rioja") selected @endif>(UTC -03:00) America/Argentina/La_Rioja</option>
                            <option value="America/Argentina/Mendoza" @if($data->timezone == "America/Argentina/Mendoza") selected @endif>(UTC -03:00) America/Argentina/Mendoza</option>
                            <option value="America/Argentina/Rio_Gallegos" @if($data->timezone == "America/Argentina/Rio_Gallegos") selected @endif>(UTC -03:00) America/Argentina/Rio_Gallegos</option>
                            <option value="America/Argentina/Salta" @if($data->timezone == "America/Argentina/Salta") selected @endif>(UTC -03:00) America/Argentina/Salta</option>
                            <option value="America/Argentina/San_Juan" @if($data->timezone == "America/Argentina/San_Juan") selected @endif>(UTC -03:00) America/Argentina/San_Juan</option>
                            <option value="America/Argentina/San_Luis" @if($data->timezone == "America/Argentina/San_Luis") selected @endif>(UTC -03:00) America/Argentina/San_Luis</option>
                            <option value="America/Argentina/Tucuman" @if($data->timezone == "America/Argentina/Tucuman") selected @endif>(UTC -03:00) America/Argentina/Tucuman</option>
                            <option value="America/Argentina/Ushuaia" @if($data->timezone == "America/Argentina/Ushuaia") selected @endif>(UTC -03:00) America/Argentina/Ushuaia</option>
                            <option value="America/Asuncion" @if($data->timezone == "America/Asuncion") selected @endif>(UTC -03:00) America/Asuncion</option>
                            <option value="America/Bahia" @if($data->timezone == "America/Bahia") selected @endif>(UTC -03:00) America/Bahia</option>
                            <option value="America/Belem" @if($data->timezone == "America/Belem") selected @endif>(UTC -03:00) America/Belem</option>
                            <option value="America/Campo_Grande" @if($data->timezone == "America/Campo_Grande") selected @endif>(UTC -03:00) America/Campo_Grande</option>
                            <option value="America/Cayenne" @if($data->timezone == "America/Cayenne") selected @endif>(UTC -03:00) America/Cayenne</option>
                            <option value="America/Cuiaba" @if($data->timezone == "America/Cuiaba") selected @endif>(UTC -03:00) America/Cuiaba</option>
                            <option value="America/Fortaleza" @if($data->timezone == "America/Fortaleza") selected @endif>(UTC -03:00) America/Fortaleza</option>
                            <option value="America/Godthab" @if($data->timezone == "America/Godthab") selected @endif>(UTC -03:00) America/Godthab</option>
                            <option value="America/Maceio" @if($data->timezone == "America/Maceio") selected @endif>(UTC -03:00) America/Maceio</option>
                            <option value="America/Miquelon" @if($data->timezone == "America/Miquelon") selected @endif>(UTC -03:00) America/Miquelon</option>
                            <option value="America/Montevideo" @if($data->timezone == "America/Montevideo") selected @endif>(UTC -03:00) America/Montevideo</option>
                            <option value="America/Paramaribo" @if($data->timezone == "America/Paramaribo") selected @endif>(UTC -03:00) America/Paramaribo</option>
                            <option value="America/Punta_Arenas" @if($data->timezone == "America/Punta_Arenas") selected @endif>(UTC -03:00) America/Punta_Arenas</option>
                            <option value="America/Recife" @if($data->timezone == "America/Recife") selected @endif>(UTC -03:00) America/Recife</option>
                            <option value="America/Santarem" @if($data->timezone == "America/Santarem") selected @endif>(UTC -03:00) America/Santarem</option>
                            <option value="America/Santiago" @if($data->timezone == "America/Santiago") selected @endif>(UTC -03:00) America/Santiago</option>
                            <option value="Antarctica/Palmer" @if($data->timezone == "Antarctica/Palmer") selected @endif>(UTC -03:00) Antarctica/Palmer</option>
                            <option value="Antarctica/Rothera" @if($data->timezone == "Antarctica/Rothera") selected @endif>(UTC -03:00) Antarctica/Rothera</option>
                            <option value="Atlantic/Stanley" @if($data->timezone == "Atlantic/Stanley") selected @endif>(UTC -03:00) Atlantic/Stanley</option>
                            <option value="America/Noronha" @if($data->timezone == "America/Noronha") selected @endif>(UTC -02:00) America/Noronha</option>
                            <option value="America/Sao_Paulo" @if($data->timezone == "America/Sao_Paulo") selected @endif>(UTC -02:00) America/Sao_Paulo</option>
                            <option value="Atlantic/South_Georgia" @if($data->timezone == "Atlantic/South_Georgia") selected @endif>(UTC -02:00) Atlantic/South_Georgia</option>
                            <option value="America/Scoresbysund" @if($data->timezone == "America/Scoresbysund") selected @endif>(UTC -01:00) America/Scoresbysund</option>
                            <option value="Atlantic/Azores" @if($data->timezone == "Atlantic/Azores") selected @endif>(UTC -01:00) Atlantic/Azores</option>
                            <option value="Atlantic/Cape_Verde" @if($data->timezone == "Atlantic/Cape_Verde") selected @endif>(UTC -01:00) Atlantic/Cape_Verde</option>
                            <option value="Africa/Abidjan" @if($data->timezone == "Africa/Abidjan") selected @endif>(UTC -00:00) Africa/Abidjan</option>
                            <option value="Africa/Accra" @if($data->timezone == "Africa/Accra") selected @endif>(UTC -00:00) Africa/Accra</option>
                            <option value="Africa/Bamako" @if($data->timezone == "Africa/Bamako") selected @endif>(UTC -00:00) Africa/Bamako</option>
                            <option value="Africa/Banjul" @if($data->timezone == "Africa/Banjul") selected @endif>(UTC -00:00) Africa/Banjul</option>
                            <option value="Africa/Bissau" @if($data->timezone == "Africa/Bissau") selected @endif>(UTC -00:00) Africa/Bissau</option>
                            <option value="Africa/Casablanca" @if($data->timezone == "Africa/Casablanca") selected @endif>(UTC -00:00) Africa/Casablanca</option>
                            <option value="Africa/Conakry" @if($data->timezone == "Africa/Conakry") selected @endif>(UTC -00:00) Africa/Conakry</option>
                            <option value="Africa/Dakar" @if($data->timezone == "Africa/Dakar") selected @endif>(UTC -00:00) Africa/Dakar</option>
                            <option value="Africa/El_Aaiun" @if($data->timezone == "Africa/El_Aaiun") selected @endif>(UTC -00:00) Africa/El_Aaiun</option>
                            <option value="Africa/Freetown" @if($data->timezone == "Africa/Freetown") selected @endif>(UTC -00:00) Africa/Freetown</option>
                            <option value="Africa/Lome" @if($data->timezone == "Africa/Lome") selected @endif>(UTC -00:00) Africa/Lome</option>
                            <option value="Africa/Monrovia" @if($data->timezone == "Africa/Monrovia") selected @endif>(UTC -00:00) Africa/Monrovia</option>
                            <option value="Africa/Nouakchott" @if($data->timezone == "Africa/Nouakchott") selected @endif>(UTC -00:00) Africa/Nouakchott</option>
                            <option value="Africa/Ouagadougou" @if($data->timezone == "Africa/Ouagadougou") selected @endif>(UTC -00:00) Africa/Ouagadougou</option>
                            <option value="Africa/Sao_Tome" @if($data->timezone == "Africa/Sao_Tome") selected @endif>(UTC -00:00) Africa/Sao_Tome</option>
                            <option value="America/Danmarkshavn" @if($data->timezone == "America/Danmarkshavn") selected @endif>(UTC -00:00) America/Danmarkshavn</option>
                            <option value="Antarctica/Troll" @if($data->timezone == "Antarctica/Troll") selected @endif>(UTC -00:00) Antarctica/Troll</option>
                            <option value="Atlantic/Canary" @if($data->timezone == "Atlantic/Canary") selected @endif>(UTC -00:00) Atlantic/Canary</option>
                            <option value="Atlantic/Faroe" @if($data->timezone == "Atlantic/Faroe") selected @endif>(UTC -00:00) Atlantic/Faroe</option>
                            <option value="Atlantic/Madeira" @if($data->timezone == "Atlantic/Madeira") selected @endif>(UTC -00:00) Atlantic/Madeira</option>
                            <option value="Atlantic/Reykjavik" @if($data->timezone == "Atlantic/Reykjavik") selected @endif>(UTC -00:00) Atlantic/Reykjavik</option>
                            <option value="Atlantic/St_Helena" @if($data->timezone == "Atlantic/St_Helena") selected @endif>(UTC -00:00) Atlantic/St_Helena</option>
                            <option value="Europe/Dublin" @if($data->timezone == "Europe/Dublin") selected @endif>(UTC -00:00) Europe/Dublin</option>
                            <option value="Europe/Guernsey" @if($data->timezone == "Europe/Guernsey") selected @endif>(UTC -00:00) Europe/Guernsey</option>
                            <option value="Europe/Isle_of_Man" @if($data->timezone == "Europe/Isle_of_Man") selected @endif>(UTC -00:00) Europe/Isle_of_Man</option>
                            <option value="Europe/Jersey" @if($data->timezone == "Europe/Jersey") selected @endif>(UTC -00:00) Europe/Jersey</option>
                            <option value="Europe/Lisbon" @if($data->timezone == "Europe/Lisbon") selected @endif>(UTC -00:00) Europe/Lisbon</option>
                            <option value="Europe/London" @if($data->timezone == "Europe/London") selected @endif>(UTC -00:00) Europe/London</option>
                            <option value="UTC" @if($data->timezone == "UTC") selected @endif>(UTC -00:00) UTC</option>
                            <option value="Africa/Algiers" @if($data->timezone == "Africa/Algiers") selected @endif>(UTC +01:00) Africa/Algiers</option>
                            <option value="Africa/Bangui" @if($data->timezone == "Africa/Bangui") selected @endif>(UTC +01:00) Africa/Bangui</option>
                            <option value="Africa/Brazzaville" @if($data->timezone == "Africa/Brazzaville") selected @endif>(UTC +01:00) Africa/Brazzaville</option>
                            <option value="Africa/Ceuta" @if($data->timezone == "Africa/Ceuta") selected @endif>(UTC +01:00) Africa/Ceuta</option>
                            <option value="Africa/Douala" @if($data->timezone == "Africa/Douala") selected @endif>(UTC +01:00) Africa/Douala</option>
                            <option value="Africa/Kinshasa" @if($data->timezone == "Africa/Kinshasa") selected @endif>(UTC +01:00) Africa/Kinshasa</option>
                            <option value="Africa/Lagos" @if($data->timezone == "Africa/Lagos") selected @endif>(UTC +01:00) Africa/Lagos</option>
                            <option value="Africa/Libreville" @if($data->timezone == "Africa/Libreville") selected @endif>(UTC +01:00) Africa/Libreville</option>
                            <option value="Africa/Luanda" @if($data->timezone == "Africa/Luanda") selected @endif>(UTC +01:00) Africa/Luanda</option>
                            <option value="Africa/Malabo" @if($data->timezone == "Africa/Malabo") selected @endif>(UTC +01:00) Africa/Malabo</option>
                            <option value="Africa/Ndjamena" @if($data->timezone == "Africa/Ndjamena") selected @endif>(UTC +01:00) Africa/Ndjamena</option>
                            <option value="Africa/Niamey" @if($data->timezone == "Africa/Niamey") selected @endif>(UTC +01:00) Africa/Niamey</option>
                            <option value="Africa/Porto-Novo" @if($data->timezone == "Africa/Porto-Novo") selected @endif>(UTC +01:00) Africa/Porto-Novo</option>
                            <option value="Africa/Tunis" @if($data->timezone == "Africa/Tunis") selected @endif>(UTC +01:00) Africa/Tunis</option>
                            <option value="Arctic/Longyearbyen" @if($data->timezone == "Arctic/Longyearbyen") selected @endif>(UTC +01:00) Arctic/Longyearbyen</option>
                            <option value="Europe/Amsterdam" @if($data->timezone == "Europe/Amsterdam") selected @endif>(UTC +01:00) Europe/Amsterdam</option>
                            <option value="Europe/Andorra" @if($data->timezone == "Europe/Andorra") selected @endif>(UTC +01:00) Europe/Andorra</option>
                            <option value="Europe/Belgrade" @if($data->timezone == "Europe/Belgrade") selected @endif>(UTC +01:00) Europe/Belgrade</option>
                            <option value="Europe/Berlin" @if($data->timezone == "Europe/Berlin") selected @endif>(UTC +01:00) Europe/Berlin</option>
                            <option value="Europe/Bratislava" @if($data->timezone == "Europe/Bratislava") selected @endif>(UTC +01:00) Europe/Bratislava</option>
                            <option value="Europe/Brussels" @if($data->timezone == "Europe/Brussels") selected @endif>(UTC +01:00) Europe/Brussels</option>
                            <option value="Europe/Budapest" @if($data->timezone == "Europe/Budapest") selected @endif>(UTC +01:00) Europe/Budapest</option>
                            <option value="Europe/Busingen" @if($data->timezone == "Europe/Busingen") selected @endif>(UTC +01:00) Europe/Busingen</option>
                            <option value="Europe/Copenhagen" @if($data->timezone == "Europe/Copenhagen") selected @endif>(UTC +01:00) Europe/Copenhagen</option>
                            <option value="Europe/Gibraltar" @if($data->timezone == "Europe/Gibraltar") selected @endif>(UTC +01:00) Europe/Gibraltar</option>
                            <option value="Europe/Ljubljana" @if($data->timezone == "Europe/Ljubljana") selected @endif>(UTC +01:00) Europe/Ljubljana</option>
                            <option value="Europe/Luxembourg" @if($data->timezone == "Europe/Luxembourg") selected @endif>(UTC +01:00) Europe/Luxembourg</option>
                            <option value="Europe/Madrid" @if($data->timezone == "Europe/Madrid") selected @endif>(UTC +01:00) Europe/Madrid</option>
                            <option value="Europe/Malta" @if($data->timezone == "Europe/Malta") selected @endif>(UTC +01:00) Europe/Malta</option>
                            <option value="Europe/Monaco" @if($data->timezone == "Europe/Monaco") selected @endif>(UTC +01:00) Europe/Monaco</option>
                            <option value="Europe/Oslo" @if($data->timezone == "Europe/Oslo") selected @endif>(UTC +01:00) Europe/Oslo</option>
                            <option value="Europe/Paris" @if($data->timezone == "Europe/Paris") selected @endif>(UTC +01:00) Europe/Paris</option>
                            <option value="Europe/Podgorica" @if($data->timezone == "Europe/Podgorica") selected @endif>(UTC +01:00) Europe/Podgorica</option>
                            <option value="Europe/Prague" @if($data->timezone == "Europe/Prague") selected @endif>(UTC +01:00) Europe/Prague</option>
                            <option value="Europe/Rome" @if($data->timezone == "Europe/Rome") selected @endif>(UTC +01:00) Europe/Rome</option>
                            <option value="Europe/San_Marino" @if($data->timezone == "Europe/San_Marino") selected @endif>(UTC +01:00) Europe/San_Marino</option>
                            <option value="Europe/Sarajevo" @if($data->timezone == "Europe/Sarajevo") selected @endif>(UTC +01:00) Europe/Sarajevo</option>
                            <option value="Europe/Skopje" @if($data->timezone == "Europe/Skopje") selected @endif>(UTC +01:00) Europe/Skopje</option>
                            <option value="Europe/Stockholm" @if($data->timezone == "Europe/Stockholm") selected @endif>(UTC +01:00) Europe/Stockholm</option>
                            <option value="Europe/Tirane" @if($data->timezone == "Europe/Tirane") selected @endif>(UTC +01:00) Europe/Tirane</option>
                            <option value="Europe/Vaduz" @if($data->timezone == "Europe/Vaduz") selected @endif>(UTC +01:00) Europe/Vaduz</option>
                            <option value="Europe/Vatican" @if($data->timezone == "Europe/Vatican") selected @endif>(UTC +01:00) Europe/Vatican</option>
                            <option value="Europe/Vienna" @if($data->timezone == "Europe/Vienna") selected @endif>(UTC +01:00) Europe/Vienna</option>
                            <option value="Europe/Warsaw" @if($data->timezone == "Europe/Warsaw") selected @endif>(UTC +01:00) Europe/Warsaw</option>
                            <option value="Europe/Zagreb" @if($data->timezone == "Europe/Zagreb") selected @endif>(UTC +01:00) Europe/Zagreb</option>
                            <option value="Europe/Zurich" @if($data->timezone == "Europe/Zurich") selected @endif>(UTC +01:00) Europe/Zurich</option>
                            <option value="Africa/Blantyre" @if($data->timezone == "Africa/Blantyre") selected @endif>(UTC +02:00) Africa/Blantyre</option>
                            <option value="Africa/Bujumbura" @if($data->timezone == "Africa/Bujumbura") selected @endif>(UTC +02:00) Africa/Bujumbura</option>
                            <option value="Africa/Cairo" @if($data->timezone == "Africa/Cairo") selected @endif>(UTC +02:00) Africa/Cairo</option>
                            <option value="Africa/Gaborone" @if($data->timezone == "Africa/Gaborone") selected @endif>(UTC +02:00) Africa/Gaborone</option>
                            <option value="Africa/Harare" @if($data->timezone == "Africa/Harare") selected @endif>(UTC +02:00) Africa/Harare</option>
                            <option value="Africa/Johannesburg" @if($data->timezone == "Africa/Johannesburg") selected @endif>(UTC +02:00) Africa/Johannesburg</option>
                            <option value="Africa/Kigali" @if($data->timezone == "Africa/Kigali") selected @endif>(UTC +02:00) Africa/Kigali</option>
                            <option value="Africa/Lubumbashi" @if($data->timezone == "Africa/Lubumbashi") selected @endif>(UTC +02:00) Africa/Lubumbashi</option>
                            <option value="Africa/Lusaka" @if($data->timezone == "Africa/Lusaka") selected @endif>(UTC +02:00) Africa/Lusaka</option>
                            <option value="Africa/Maputo" @if($data->timezone == "Africa/Maputo") selected @endif>(UTC +02:00) Africa/Maputo</option>
                            <option value="Africa/Maseru" @if($data->timezone == "Africa/Maseru") selected @endif>(UTC +02:00) Africa/Maseru</option>
                            <option value="Africa/Mbabane" @if($data->timezone == "Africa/Mbabane") selected @endif>(UTC +02:00) Africa/Mbabane</option>
                            <option value="Africa/Tripoli" @if($data->timezone == "Africa/Tripoli") selected @endif>(UTC +02:00) Africa/Tripoli</option>
                            <option value="Africa/Windhoek" @if($data->timezone == "Africa/Windhoek") selected @endif>(UTC +02:00) Africa/Windhoek</option>
                            <option value="Asia/Amman" @if($data->timezone == "Asia/Amman") selected @endif>(UTC +02:00) Asia/Amman</option>
                            <option value="Asia/Beirut" @if($data->timezone == "Asia/Beirut") selected @endif>(UTC +02:00) Asia/Beirut</option>
                            <option value="Asia/Damascus" @if($data->timezone == "Asia/Damascus") selected @endif>(UTC +02:00) Asia/Damascus</option>
                            <option value="Asia/Gaza" @if($data->timezone == "Asia/Gaza") selected @endif>(UTC +02:00) Asia/Gaza</option>
                            <option value="Asia/Hebron" @if($data->timezone == "Asia/Hebron") selected @endif>(UTC +02:00) Asia/Hebron</option>
                            <option value="Asia/Jerusalem" @if($data->timezone == "Asia/Jerusalem") selected @endif>(UTC +02:00) Asia/Jerusalem</option>
                            <option value="Asia/Nicosia" @if($data->timezone == "Asia/Nicosia") selected @endif>(UTC +02:00) Asia/Nicosia</option>
                            <option value="Europe/Athens" @if($data->timezone == "Europe/Athens") selected @endif>(UTC +02:00) Europe/Athens</option>
                            <option value="Europe/Bucharest" @if($data->timezone == "Europe/Bucharest") selected @endif>(UTC +02:00) Europe/Bucharest</option>
                            <option value="Europe/Chisinau" @if($data->timezone == "Europe/Chisinau") selected @endif>(UTC +02:00) Europe/Chisinau</option>
                            <option value="Europe/Helsinki" @if($data->timezone == "Europe/Helsinki") selected @endif>(UTC +02:00) Europe/Helsinki</option>
                            <option value="Europe/Kaliningrad" @if($data->timezone == "Europe/Kaliningrad") selected @endif>(UTC +02:00) Europe/Kaliningrad</option>
                            <option value="Europe/Kiev" @if($data->timezone == "Europe/Kiev") selected @endif>(UTC +02:00) Europe/Kiev</option>
                            <option value="Europe/Mariehamn" @if($data->timezone == "Europe/Mariehamn") selected @endif>(UTC +02:00) Europe/Mariehamn</option>
                            <option value="Europe/Riga" @if($data->timezone == "Europe/Riga") selected @endif>(UTC +02:00) Europe/Riga</option>
                            <option value="Europe/Sofia" @if($data->timezone == "Europe/Sofia") selected @endif>(UTC +02:00) Europe/Sofia</option>
                            <option value="Europe/Tallinn" @if($data->timezone == "Europe/Tallinn") selected @endif>(UTC +02:00) Europe/Tallinn</option>
                            <option value="Europe/Uzhgorod" @if($data->timezone == "Europe/Uzhgorod") selected @endif>(UTC +02:00) Europe/Uzhgorod</option>
                            <option value="Europe/Vilnius" @if($data->timezone == "Europe/Vilnius") selected @endif>(UTC +02:00) Europe/Vilnius</option>
                            <option value="Europe/Zaporozhye" @if($data->timezone == "Europe/Zaporozhye") selected @endif>(UTC +02:00) Europe/Zaporozhye</option>
                            <option value="Africa/Addis_Ababa" @if($data->timezone == "Africa/Addis_Ababa") selected @endif>(UTC +03:00) Africa/Addis_Ababa</option>
                            <option value="Africa/Asmara" @if($data->timezone == "Africa/Asmara") selected @endif>(UTC +03:00) Africa/Asmara</option>
                            <option value="Africa/Dar_es_Salaam" @if($data->timezone == "Africa/Dar_es_Salaam") selected @endif>(UTC +03:00) Africa/Dar_es_Salaam</option>
                            <option value="Africa/Djibouti" @if($data->timezone == "Africa/Djibouti") selected @endif>(UTC +03:00) Africa/Djibouti</option>
                            <option value="Africa/Juba" @if($data->timezone == "Africa/Juba") selected @endif>(UTC +03:00) Africa/Juba</option>
                            <option value="Africa/Kampala" @if($data->timezone == "Africa/Kampala") selected @endif>(UTC +03:00) Africa/Kampala</option>
                            <option value="Africa/Khartoum" @if($data->timezone == "Africa/Khartoum") selected @endif>(UTC +03:00) Africa/Khartoum</option>
                            <option value="Africa/Mogadishu" @if($data->timezone == "Africa/Mogadishu") selected @endif>(UTC +03:00) Africa/Mogadishu</option>
                            <option value="Africa/Nairobi" @if($data->timezone == "Africa/Nairobi") selected @endif>(UTC +03:00) Africa/Nairobi</option>
                            <option value="Antarctica/Syowa" @if($data->timezone == "Antarctica/Syowa") selected @endif>(UTC +03:00) Antarctica/Syowa</option>
                            <option value="Asia/Aden" @if($data->timezone == "Asia/Aden") selected @endif>(UTC +03:00) Asia/Aden</option>
                            <option value="Asia/Baghdad" @if($data->timezone == "Asia/Baghdad") selected @endif>(UTC +03:00) Asia/Baghdad</option>
                            <option value="Asia/Bahrain" @if($data->timezone == "Asia/Bahrain") selected @endif>(UTC +03:00) Asia/Bahrain</option>
                            <option value="Asia/Famagusta" @if($data->timezone == "Asia/Famagusta") selected @endif>(UTC +03:00) Asia/Famagusta</option>
                            <option value="Asia/Kuwait" @if($data->timezone == "Asia/Kuwait") selected @endif>(UTC +03:00) Asia/Kuwait</option>
                            <option value="Asia/Qatar" @if($data->timezone == "Asia/Qatar") selected @endif>(UTC +03:00) Asia/Qatar</option>
                            <option value="Asia/Riyadh" @if($data->timezone == "Asia/Riyadh") selected @endif>(UTC +03:00) Asia/Riyadh</option>
                            <option value="Europe/Istanbul" @if($data->timezone == "Europe/Istanbul") selected @endif>(UTC +03:00) Europe/Istanbul</option>
                            <option value="Europe/Kirov" @if($data->timezone == "Europe/Kirov") selected @endif>(UTC +03:00) Europe/Kirov</option>
                            <option value="Europe/Minsk" @if($data->timezone == "Europe/Minsk") selected @endif>(UTC +03:00) Europe/Minsk</option>
                            <option value="Europe/Moscow" @if($data->timezone == "Europe/Moscow") selected @endif>(UTC +03:00) Europe/Moscow</option>
                            <option value="Europe/Simferopol" @if($data->timezone == "Europe/Simferopol") selected @endif>(UTC +03:00) Europe/Simferopol</option>
                            <option value="Europe/Volgograd" @if($data->timezone == "Europe/Volgograd") selected @endif>(UTC +03:00) Europe/Volgograd</option>
                            <option value="Indian/Antananarivo" @if($data->timezone == "Indian/Antananarivo") selected @endif>(UTC +03:00) Indian/Antananarivo</option>
                            <option value="Indian/Comoro" @if($data->timezone == "Indian/Comoro") selected @endif>(UTC +03:00) Indian/Comoro</option>
                            <option value="Indian/Mayotte" @if($data->timezone == "Indian/Mayotte") selected @endif>(UTC +03:00) Indian/Mayotte</option>
                            <option value="Asia/Tehran" @if($data->timezone == "Asia/Tehran") selected @endif>(UTC +03:30) Asia/Tehran</option>
                            <option value="Asia/Baku" @if($data->timezone == "Asia/Baku") selected @endif>(UTC +04:00) Asia/Baku</option>
                            <option value="Asia/Dubai" @if($data->timezone == "Asia/Dubai") selected @endif>(UTC +04:00) Asia/Dubai</option>
                            <option value="Asia/Muscat" @if($data->timezone == "Asia/Muscat") selected @endif>(UTC +04:00) Asia/Muscat</option>
                            <option value="Asia/Tbilisi" @if($data->timezone == "Asia/Tbilisi") selected @endif>(UTC +04:00) Asia/Tbilisi</option>
                            <option value="Asia/Yerevan" @if($data->timezone == "Asia/Yerevan") selected @endif>(UTC +04:00) Asia/Yerevan</option>
                            <option value="Europe/Astrakhan" @if($data->timezone == "Europe/Astrakhan") selected @endif>(UTC +04:00) Europe/Astrakhan</option>
                            <option value="Europe/Samara" @if($data->timezone == "Europe/Samara") selected @endif>(UTC +04:00) Europe/Samara</option>
                            <option value="Europe/Saratov" @if($data->timezone == "Europe/Saratov") selected @endif>(UTC +04:00) Europe/Saratov</option>
                            <option value="Europe/Ulyanovsk" @if($data->timezone == "Europe/Ulyanovsk") selected @endif>(UTC +04:00) Europe/Ulyanovsk</option>
                            <option value="Indian/Mahe" @if($data->timezone == "Indian/Mahe") selected @endif>(UTC +04:00) Indian/Mahe</option>
                            <option value="Indian/Mauritius" @if($data->timezone == "Indian/Mauritius") selected @endif>(UTC +04:00) Indian/Mauritius</option>
                            <option value="Indian/Reunion" @if($data->timezone == "Indian/Reunion") selected @endif>(UTC +04:00) Indian/Reunion</option>
                            <option value="Asia/Kabul" @if($data->timezone == "Asia/Kabul") selected @endif>(UTC +04:30) Asia/Kabul</option>
                            <option value="Antarctica/Mawson" @if($data->timezone == "Antarctica/Mawson") selected @endif>(UTC +05:00) Antarctica/Mawson</option>
                            <option value="Asia/Aqtau" @if($data->timezone == "Asia/Aqtau") selected @endif>(UTC +05:00) Asia/Aqtau</option>
                            <option value="Asia/Aqtobe" @if($data->timezone == "Asia/Aqtobe") selected @endif>(UTC +05:00) Asia/Aqtobe</option>
                            <option value="Asia/Ashgabat" @if($data->timezone == "Asia/Ashgabat") selected @endif>(UTC +05:00) Asia/Ashgabat</option>
                            <option value="Asia/Atyrau" @if($data->timezone == "Asia/Atyrau") selected @endif>(UTC +05:00) Asia/Atyrau</option>
                            <option value="Asia/Dushanbe" @if($data->timezone == "Asia/Dushanbe") selected @endif>(UTC +05:00) Asia/Dushanbe</option>
                            <option value="Asia/Karachi" @if($data->timezone == "Asia/Karachi") selected @endif>(UTC +05:00) Asia/Karachi</option>
                            <option value="Asia/Oral" @if($data->timezone == "Asia/Oral") selected @endif>(UTC +05:00) Asia/Oral</option>
                            <option value="Asia/Samarkand" @if($data->timezone == "Asia/Samarkand") selected @endif>(UTC +05:00) Asia/Samarkand</option>
                            <option value="Asia/Tashkent" @if($data->timezone == "Asia/Tashkent") selected @endif>(UTC +05:00) Asia/Tashkent</option>
                            <option value="Asia/Yekaterinburg" @if($data->timezone == "Asia/Yekaterinburg") selected @endif>(UTC +05:00) Asia/Yekaterinburg</option>
                            <option value="Indian/Kerguelen" @if($data->timezone == "Indian/Kerguelen") selected @endif>(UTC +05:00) Indian/Kerguelen</option>
                            <option value="Indian/Maldives" @if($data->timezone == "Indian/Maldives") selected @endif>(UTC +05:00) Indian/Maldives</option>
                            <option value="Asia/Colombo" @if($data->timezone == "Asia/Colombo") selected @endif>(UTC +05:30) Asia/Colombo</option>
                            <option value="Asia/Kolkata" @if($data->timezone == "Asia/Kolkata") selected @endif>(UTC +05:30) Asia/Kolkata</option>
                            <option value="Asia/Kathmandu" @if($data->timezone == "Asia/Kathmandu") selected @endif>(UTC +05:45) Asia/Kathmandu</option>
                            <option value="Antarctica/Vostok" @if($data->timezone == "Antarctica/Vostok") selected @endif>(UTC +06:00) Antarctica/Vostok</option>
                            <option value="Asia/Almaty" @if($data->timezone == "Asia/Almaty") selected @endif>(UTC +06:00) Asia/Almaty</option>
                            <option value="Asia/Bishkek" @if($data->timezone == "Asia/Bishkek") selected @endif>(UTC +06:00) Asia/Bishkek</option>
                            <option value="Asia/Dhaka" @if($data->timezone == "Asia/Dhaka") selected @endif>(UTC +06:00) Asia/Dhaka</option>
                            <option value="Asia/Omsk" @if($data->timezone == "Asia/Omsk") selected @endif>(UTC +06:00) Asia/Omsk</option>
                            <option value="Asia/Qyzylorda" @if($data->timezone == "Asia/Qyzylorda") selected @endif>(UTC +06:00) Asia/Qyzylorda</option>
                            <option value="Asia/Thimphu" @if($data->timezone == "Asia/Thimphu") selected @endif>(UTC +06:00) Asia/Thimphu</option>
                            <option value="Asia/Urumqi" @if($data->timezone == "Asia/Urumqi") selected @endif>(UTC +06:00) Asia/Urumqi</option>
                            <option value="Indian/Chagos" @if($data->timezone == "Indian/Chagos") selected @endif>(UTC +06:00) Indian/Chagos</option>
                            <option value="Asia/Yangon" @if($data->timezone == "Asia/Yangon") selected @endif>(UTC +06:30) Asia/Yangon</option>
                            <option value="Indian/Cocos" @if($data->timezone == "Indian/Cocos") selected @endif>(UTC +06:30) Indian/Cocos</option>
                            <option value="Antarctica/Davis" @if($data->timezone == "Antarctica/Davis") selected @endif>(UTC +07:00) Antarctica/Davis</option>
                            <option value="Asia/Bangkok" @if($data->timezone == "Asia/Bangkok") selected @endif>(UTC +07:00) Asia/Bangkok</option>
                            <option value="Asia/Barnaul" @if($data->timezone == "Asia/Barnaul") selected @endif>(UTC +07:00) Asia/Barnaul</option>
                            <option value="Asia/Ho_Chi_Minh" @if($data->timezone == "Asia/Ho_Chi_Minh") selected @endif>(UTC +07:00) Asia/Ho_Chi_Minh</option>
                            <option value="Asia/Hovd" @if($data->timezone == "Asia/Hovd") selected @endif>(UTC +07:00) Asia/Hovd</option>
                            <option value="Asia/Jakarta" @if($data->timezone == "Asia/Jakarta") selected @endif>(UTC +07:00) Asia/Jakarta</option>
                            <option value="Asia/Krasnoyarsk" @if($data->timezone == "Asia/Krasnoyarsk") selected @endif>(UTC +07:00) Asia/Krasnoyarsk</option>
                            <option value="Asia/Novokuznetsk" @if($data->timezone == "Asia/Novokuznetsk") selected @endif>(UTC +07:00) Asia/Novokuznetsk</option>
                            <option value="Asia/Novosibirsk" @if($data->timezone == "Asia/Novosibirsk") selected @endif>(UTC +07:00) Asia/Novosibirsk</option>
                            <option value="Asia/Phnom_Penh" @if($data->timezone == "Asia/Phnom_Penh") selected @endif>(UTC +07:00) Asia/Phnom_Penh</option>
                            <option value="Asia/Pontianak" @if($data->timezone == "Asia/Pontianak") selected @endif>(UTC +07:00) Asia/Pontianak</option>
                            <option value="Asia/Tomsk" @if($data->timezone == "Asia/Tomsk") selected @endif>(UTC +07:00) Asia/Tomsk</option>
                            <option value="Asia/Vientiane" @if($data->timezone == "Asia/Vientiane") selected @endif>(UTC +07:00) Asia/Vientiane</option>
                            <option value="Indian/Christmas" @if($data->timezone == "Indian/Christmas") selected @endif>(UTC +07:00) Indian/Christmas</option>
                            <option value="Asia/Brunei" @if($data->timezone == "Asia/Brunei") selected @endif>(UTC +08:00) Asia/Brunei</option>
                            <option value="Asia/Choibalsan" @if($data->timezone == "Asia/Choibalsan") selected @endif>(UTC +08:00) Asia/Choibalsan</option>
                            <option value="Asia/Hong_Kong" @if($data->timezone == "Asia/Hong_Kong") selected @endif>(UTC +08:00) Asia/Hong_Kong</option>
                            <option value="Asia/Irkutsk" @if($data->timezone == "Asia/Irkutsk") selected @endif>(UTC +08:00) Asia/Irkutsk</option>
                            <option value="Asia/Kuala_Lumpur" @if($data->timezone == "Asia/Kuala_Lumpur") selected @endif>(UTC +08:00) Asia/Kuala_Lumpur</option>
                            <option value="Asia/Kuching" @if($data->timezone == "Asia/Kuching") selected @endif>(UTC +08:00) Asia/Kuching</option>
                            <option value="Asia/Macau" @if($data->timezone == "Asia/Macau") selected @endif>(UTC +08:00) Asia/Macau</option>
                            <option value="Asia/Makassar" @if($data->timezone == "Asia/Makassar") selected @endif>(UTC +08:00) Asia/Makassar</option>
                            <option value="Asia/Manila" @if($data->timezone == "Asia/Manila") selected @endif>(UTC +08:00) Asia/Manila</option>
                            <option value="Asia/Shanghai" @if($data->timezone == "Asia/Shanghai") selected @endif>(UTC +08:00) Asia/Shanghai</option>
                            <option value="Asia/Singapore" @if($data->timezone == "Asia/Singapore") selected @endif>(UTC +08:00) Asia/Singapore</option>
                            <option value="Asia/Taipei" @if($data->timezone == "Asia/Taipei") selected @endif>(UTC +08:00) Asia/Taipei</option>
                            <option value="Asia/Ulaanbaatar" @if($data->timezone == "Asia/Ulaanbaatar") selected @endif>(UTC +08:00) Asia/Ulaanbaatar</option>
                            <option value="Australia/Perth" @if($data->timezone == "Australia/Perth") selected @endif>(UTC +08:00) Australia/Perth</option>
                            <option value="Asia/Pyongyang" @if($data->timezone == "Asia/Pyongyang") selected @endif>(UTC +08:30) Asia/Pyongyang</option>
                            <option value="Australia/Eucla" @if($data->timezone == "Australia/Eucla") selected @endif>(UTC +08:45) Australia/Eucla</option>
                            <option value="Asia/Chita" @if($data->timezone == "Asia/Chita") selected @endif>(UTC +09:00) Asia/Chita</option>
                            <option value="Asia/Dili" @if($data->timezone == "Asia/Dili") selected @endif>(UTC +09:00) Asia/Dili</option>
                            <option value="Asia/Jayapura" @if($data->timezone == "Asia/Jayapura") selected @endif>(UTC +09:00) Asia/Jayapura</option>
                            <option value="Asia/Khandyga" @if($data->timezone == "Asia/Khandyga") selected @endif>(UTC +09:00) Asia/Khandyga</option>
                            <option value="Asia/Seoul" @if($data->timezone == "Asia/Seoul") selected @endif>(UTC +09:00) Asia/Seoul</option>
                            <option value="Asia/Tokyo" @if($data->timezone == "Asia/Tokyo") selected @endif>(UTC +09:00) Asia/Tokyo</option>
                            <option value="Asia/Yakutsk" @if($data->timezone == "Asia/Yakutsk") selected @endif>(UTC +09:00) Asia/Yakutsk</option>
                            <option value="Pacific/Palau" @if($data->timezone == "Pacific/Palau") selected @endif>(UTC +09:00) Pacific/Palau</option>
                            <option value="Australia/Darwin" @if($data->timezone == "Australia/Darwin") selected @endif>(UTC +09:30) Australia/Darwin</option>
                            <option value="Antarctica/DumontDUrville" @if($data->timezone == "Antarctica/DumontDUrville") selected @endif>(UTC +10:00) Antarctica/DumontDUrville</option>
                            <option value="Asia/Ust-Nera" @if($data->timezone == "Asia/Ust-Nera") selected @endif>(UTC +10:00) Asia/Ust-Nera</option>
                            <option value="Asia/Vladivostok" @if($data->timezone == "Asia/Vladivostok") selected @endif>(UTC +10:00) Asia/Vladivostok</option>
                            <option value="Australia/Brisbane" @if($data->timezone == "Australia/Brisbane") selected @endif>(UTC +10:00) Australia/Brisbane</option>
                            <option value="Australia/Lindeman" @if($data->timezone == "Australia/Lindeman") selected @endif>(UTC +10:00) Australia/Lindeman</option>
                            <option value="Pacific/Chuuk" @if($data->timezone == "Pacific/Chuuk") selected @endif>(UTC +10:00) Pacific/Chuuk</option>
                            <option value="Pacific/Guam" @if($data->timezone == "Pacific/Guam") selected @endif>(UTC +10:00) Pacific/Guam</option>
                            <option value="Pacific/Port_Moresby" @if($data->timezone == "Pacific/Port_Moresby") selected @endif>(UTC +10:00) Pacific/Port_Moresby</option>
                            <option value="Pacific/Saipan" @if($data->timezone == "Pacific/Saipan") selected @endif>(UTC +10:00) Pacific/Saipan</option>
                            <option value="Australia/Adelaide" @if($data->timezone == "Australia/Adelaide") selected @endif>(UTC +10:30) Australia/Adelaide</option>
                            <option value="Australia/Broken_Hill" @if($data->timezone == "Australia/Broken_Hill") selected @endif>(UTC +10:30) Australia/Broken_Hill</option>
                            <option value="Antarctica/Casey" @if($data->timezone == "Antarctica/Casey") selected @endif>(UTC +11:00) Antarctica/Casey</option>
                            <option value="Antarctica/Macquarie" @if($data->timezone == "Antarctica/Macquarie") selected @endif>(UTC +11:00) Antarctica/Macquarie</option>
                            <option value="Asia/Magadan" @if($data->timezone == "Asia/Magadan") selected @endif>(UTC +11:00) Asia/Magadan</option>
                            <option value="Asia/Sakhalin" @if($data->timezone == "Asia/Sakhalin") selected @endif>(UTC +11:00) Asia/Sakhalin</option>
                            <option value="Asia/Srednekolymsk" @if($data->timezone == "Asia/Srednekolymsk") selected @endif>(UTC +11:00) Asia/Srednekolymsk</option>
                            <option value="Australia/Currie" @if($data->timezone == "Australia/Currie") selected @endif>(UTC +11:00) Australia/Currie</option>
                            <option value="Australia/Hobart" @if($data->timezone == "Australia/Hobart") selected @endif>(UTC +11:00) Australia/Hobart</option>
                            <option value="Australia/Lord_Howe" @if($data->timezone == "Australia/Lord_Howe") selected @endif>(UTC +11:00) Australia/Lord_Howe</option>
                            <option value="Australia/Melbourne" @if($data->timezone == "Australia/Melbourne") selected @endif>(UTC +11:00) Australia/Melbourne</option>
                            <option value="Australia/Sydney" @if($data->timezone == "Australia/Sydney") selected @endif>(UTC +11:00) Australia/Sydney</option>
                            <option value="Pacific/Bougainville" @if($data->timezone == "Pacific/Bougainville") selected @endif>(UTC +11:00) Pacific/Bougainville</option>
                            <option value="Pacific/Efate" @if($data->timezone == "Pacific/Efate") selected @endif>(UTC +11:00) Pacific/Efate</option>
                            <option value="Pacific/Guadalcanal" @if($data->timezone == "Pacific/Guadalcanal") selected @endif>(UTC +11:00) Pacific/Guadalcanal</option>
                            <option value="Pacific/Kosrae" @if($data->timezone == "Pacific/Kosrae") selected @endif>(UTC +11:00) Pacific/Kosrae</option>
                            <option value="Pacific/Norfolk" @if($data->timezone == "Pacific/Norfolk") selected @endif>(UTC +11:00) Pacific/Norfolk</option>
                            <option value="Pacific/Noumea" @if($data->timezone == "Pacific/Noumea") selected @endif>(UTC +11:00) Pacific/Noumea</option>
                            <option value="Pacific/Pohnpei" @if($data->timezone == "Pacific/Pohnpei") selected @endif>(UTC +11:00) Pacific/Pohnpei</option>
                            <option value="Asia/Anadyr" @if($data->timezone == "Asia/Anadyr") selected @endif>(UTC +12:00) Asia/Anadyr</option>
                            <option value="Asia/Kamchatka" @if($data->timezone == "Asia/Kamchatka") selected @endif>(UTC +12:00) Asia/Kamchatka</option>
                            <option value="Pacific/Funafuti" @if($data->timezone == "Pacific/Funafuti") selected @endif>(UTC +12:00) Pacific/Funafuti</option>
                            <option value="Pacific/Kwajalein" @if($data->timezone == "Pacific/Kwajalein") selected @endif>(UTC +12:00) Pacific/Kwajalein</option>
                            <option value="Pacific/Majuro" @if($data->timezone == "Pacific/Majuro") selected @endif>(UTC +12:00) Pacific/Majuro</option>
                            <option value="Pacific/Nauru" @if($data->timezone == "Pacific/Nauru") selected @endif>(UTC +12:00) Pacific/Nauru</option>
                            <option value="Pacific/Tarawa" @if($data->timezone == "Pacific/Tarawa") selected @endif>(UTC +12:00) Pacific/Tarawa</option>
                            <option value="Pacific/Wake" @if($data->timezone == "Pacific/Wake") selected @endif>(UTC +12:00) Pacific/Wake</option>
                            <option value="Pacific/Wallis" @if($data->timezone == "Pacific/Wallis") selected @endif>(UTC +12:00) Pacific/Wallis</option>
                            <option value="Antarctica/McMurdo" @if($data->timezone == "Antarctica/McMurdo") selected @endif>(UTC +13:00) Antarctica/McMurdo</option>
                            <option value="Pacific/Auckland" @if($data->timezone == "Pacific/Auckland") selected @endif>(UTC +13:00) Pacific/Auckland</option>
                            <option value="Pacific/Enderbury" @if($data->timezone == "Pacific/Enderbury") selected @endif>(UTC +13:00) Pacific/Enderbury</option>
                            <option value="Pacific/Fakaofo" @if($data->timezone == "Pacific/Fakaofo") selected @endif>(UTC +13:00) Pacific/Fakaofo</option>
                            <option value="Pacific/Fiji" @if($data->timezone == "Pacific/Fiji") selected @endif>(UTC +13:00) Pacific/Fiji</option>
                            <option value="Pacific/Chatham" @if($data->timezone == "Pacific/Chatham") selected @endif>(UTC +13:45) Pacific/Chatham</option>
                            <option value="Pacific/Apia" @if($data->timezone == "Pacific/Apia") selected @endif>(UTC +14:00) Pacific/Apia</option>
                            <option value="Pacific/Kiritimati" @if($data->timezone == "Pacific/Kiritimati") selected @endif>(UTC +14:00) Pacific/Kiritimati</option>
                            <option value="Pacific/Tongatapu" @if($data->timezone == "Pacific/Tongatapu") selected @endif>(UTC +14:00) Pacific/Tongatapu</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="time_format" class="mb-0 form-label">{{ __("Time format") }}</label><br>
                          <small class="text-muted">{{ __("Select your preferred time format") }}</small>
                          <select name="time_format" class="form-select" required>
                            <option value="" disabled selected>Choose...</option>
                            <option value="12" @isset($data->time_format) @if($data->time_format == 12) selected @endif @endisset>12 {{ __("Hour") }} (6:20 pm)</option>
                            <option value="24" @isset($data->time_format) @if($data->time_format == 24) selected @endif @endisset>24 {{ __("Hour") }} (16:20)</option>
                          </select>
                        </div>

                        <p class="mb-0 mt-4">{{ __("Optional Features") }}</p>
                        <hr class="mt-0">

                        <div class="mb-3">
                            <p class="mb-0">{{ __("RFID Clock In and Clock Out") }}</p>
                            <small class="text-muted">{{ __("Turn on to enable features for RFID Web Clock In and Clock Out") }}</small>

                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="customSwitch1" name="rfid" @isset($data->rfid)@if($data->rfid == "on") checked @endif @endisset>
                              <label class="form-check-label" for="customSwitch1">{{ __("Toggle Off/On") }}</label>
                            </div>
                        </div>

                        <p class="mb-0 mt-4 text-uppercase">{{ __("Safe Guarding") }}</p>
                        <hr class="mt-0">

                        <div class="mb-3">
                          <label for="status" class="mb-0 form-label">{{ __("Web clock IP restriction") }}</label><br>
                          <small class="text-muted">{{ __("Turn on to block clocking from unknown device or IP address") }}</small>
                          <textarea name="iprestriction" rows="3" class="form-control" placeholder="{{ __('Enter IP addresses if more than one add comma after each IP address')}}">@isset($data->iprestriction){{ $data->iprestriction }}@endisset</textarea>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                            </button>
                        </div>
                    </form>
                    </div>
                </div>

                <div class="tab-pane fade show" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <h2>Workday a time clock application for employees</h2>
                    <p>Easily track and manage employee work hours on jobs, improve your payroll process and collaborate with your timekeeping employees like never before.</p>

                    <p class="lead mb-0">Features</p>
                    <ul>
                        <li>Employee Management (HRIS)</li>
                        <li>Time and Attendance Management</li>
                        <li>Employee Time Tracking</li>
                        <li>Shift Management</li>
                        <li>Leave Management</li>
                        <li>Reporting and Analytics</li>
                        <li>Multi-company</li>
                        <li>Manager and Employee self-service</li>
                    </ul>

                    <div class="mt-4">
                        <p class="text-muted mb-0">{{ __("Version") }} 3.0</p>
                        <p class="text-muted">{{ __("Copyright") }} (c) @php echo date('Y') @endphp Codefactor. {{ __("All rights reserved") }}.</p>
                    </div>
                </div>

                <div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="attributions-tab">
                    <h6 class="mb-0">{{ __("Legal Notice") }}</h6>
                    <p>{{ __("Copyright") }} (c) @php echo date('Y') @endphp Brian Luna. {{ __("All rights reserved") }}.</p>
                    
                    <p class="font-weight-bolder mb-0">Laravel</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright (c) Taylor Otwell
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="font-weight-bolder mb-0">Bootstrap</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright 2011-2020 Twitter, Inc.
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="font-weight-bolder mb-0">jQuery JavaScript Library</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright jQuery Foundation and other contributors
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="font-weight-bolder mb-0">DataTables</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright 2008-2020 SpryMedia Ltd
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="font-weight-bolder mb-0">Chart.js</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright 2018 Chart.js Contributors
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>

                    <p class="font-weight-bolder mb-0">Moment.js</p>
                    <p class="text-muted">The MIT License (MIT)</p>
                    <p class="ps-3 col-md-6 text-muted">
                        Copyright (c) JS Foundation and other contributors
                        <br><br>
                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:
                        <br><br>
                        The above copyright notice and this permission notice shall be included in
                        all copies or substantial portions of the Software.
                        <br><br>
                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                        THE SOFTWARE.
                    </p>
                        
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
@endsection