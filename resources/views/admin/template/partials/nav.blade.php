<div role="tabpanel">
<ul class="nav nav-tabs nav-justified" role="tablist">
  <li role="presentation" ><a href="{{URL::action('ClienteController@index')}}" aria-controls="" data-toggle="tab" role="tab">Cliente</a></li>
  <li role="presentation" ><a href="{{URL::action('TipoclienteController@index')}}" aria-controls="" data-toggle="tab" role="tab">Tipo Cliente</a></li>
  </ul>
  <div class="tab-content">
  	<div role="tabpanel" clas="tab-pane active" id="Cliente"></div>
  	<div role="tabpanel" clas="tab-pane" id="Tipo Cliente"></div>
  </div>

</div>
